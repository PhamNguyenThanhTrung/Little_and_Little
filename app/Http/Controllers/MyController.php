<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Book_tickets;
use PHPUnit\Framework\Attributes\Ticket;
use App\Models\payment_pages;
use App\Models\Contact;
use App\Models\Event;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;
use BaconQrCode\Renderer\Image\Png;
use BaconQrCode\Writer;
use Illuminate\Support\Facades\Mail;
use ZipArchive;

class MyController extends Controller
{

    //mua vé
    public function book_tickets(Request $request)
    {
        // Kiểm tra và validate dữ liệu từ request
        $data = $request->validate([
            'Ticket_type' => 'required',
            'Quantity' => 'required',
            'Date_of_use' => 'required|date_format:d-m-Y',
            'Full_name' => 'required',
            'Tell' => 'required',
            'Email' => 'required|email',
        ]);

        // Sửa định dạng ngày
        $dateOfUse = date('Y-m-d', strtotime($data['Date_of_use']));
        $data['Date_of_use'] = $dateOfUse;

        // Tạo một đối tượng Book_tickets và gán dữ liệu từ request
        $bookTicket = new Book_tickets();
        $bookTicket->Ticket_type = $data['Ticket_type'];
        $bookTicket->Quantity = $data['Quantity'];
        $bookTicket->Date_of_use = $data['Date_of_use'];
        $bookTicket->Full_name = $data['Full_name'];
        $bookTicket->Tell = $data['Tell'];
        $bookTicket->Email = $data['Email'];

        // Lưu đối tượng Book_tickets vào cơ sở dữ liệu
        $bookTicket->save();

        // Lấy ra đối tượng book_tickets mới nhất
        $latestBookTicket = Book_tickets::latest()->first();

        // Thiết lập session 'success'
        $success = "Đặt vé thành công";

        // Chuyển hướng đến trang chỉnh sửa thanh toán
        return redirect()->route('PaymentPage.edit_Payment', ['id' => $latestBookTicket->id])->with('success', $success);
    }


    //edit thanh toán
    public function edit_Payment($id)
    {
        $book_tickets = book_tickets::find($id);

        if (!$book_tickets) {
            return response()->json(['error' => 'Dịch Vụ không tồn tại'], 404);
        }

        return view('paymentpage', compact('book_tickets'));
    }



    //thanh toán
    public function storePaymentData(Request $request, $id)
    {
        // Kiểm tra xem đã tồn tại mã QR cho $id trong cơ sở dữ liệu hay chưa
        $existingPaymentPage = payment_pages::where('id_book_tickets', $id)->first();
        if ($existingPaymentPage) {
            // Nếu đã tồn tại, trả về đoạn mã JavaScript để xác nhận tải lại trang
            return view('homepage');
        }
        $data = $request->validate([
            'Card_number' => 'required',
            'Full_name_owner' => 'required',
            'Expiration_date' => 'required|date_format:d-m-Y',
            'Security_code' => 'required',
        ]);
        // Lấy dữ liệu từ bảng book_tickets
        $bookTicket = book_tickets::find($id);

        // Kiểm tra nếu không tìm thấy dữ liệu trong bảng book_tickets
        if (!$bookTicket) {
            return response()->json(['error' => 'Dữ liệu book_tickets không tồn tại'], 404);
        }
        // Tạo một đối tượng PaymentPage và gán dữ liệu từ request và book_tickets
        $paymentPages = new payment_pages();
        $paymentPages->id_book_tickets = $bookTicket->id;
        $paymentPages->Ticket_type = $bookTicket->Ticket_type;
        $paymentPages->Quantity = $bookTicket->Quantity;
        $paymentPages->Date_of_use = $bookTicket->Date_of_use;
        $paymentPages->Full_name = $bookTicket->Full_name;
        $paymentPages->Tell = $bookTicket->Tell;
        $paymentPages->Email = $bookTicket->Email;
        $paymentPages->Card_number = $data['Card_number'];
        $paymentPages->Full_name_owner = $data['Full_name_owner'];
        // Sửa định dạng ngày
        $expirationDate = Carbon::createFromFormat('d-m-Y', $data['Expiration_date'])->toDateString();
        $paymentPages->Expiration_date = $expirationDate;
        $paymentPages->Security_code = $data['Security_code'];
        // Tạo mã QR
        // Số lượng mã QR code cần tạo
        $quantity = $paymentPages->Quantity;
        // Mảng chứa đường dẫn của các mã QR code
        $qrCodePaths = [];
        $previousPaymentPage = payment_pages::latest()->first();
        $previousIdqrCodePath = $previousPaymentPage ? $previousPaymentPage->idqrCodePath : 0;
        $paymentPages->save();
        $startId = $previousIdqrCodePath;
        $qrCodeTexts = [];
        for ($i = 0; $i < $quantity; $i++) {
            // $qrCodeText = 'Mã vé ' . $paymentPages->Ticket_type . ' của bạn là ' . ($startId + $i);
            $randomString = Str::random(3);

            $qrCodeText = 'ALT' . $randomString . ($startId + $i);
            $qrCodeText = utf8_encode($qrCodeText);
            $qrCode = QrCode::size(200)->color(0, 0, 0)->backgroundColor(255, 255, 255)->generate('ALT' . $qrCodeText);

            $qrCodeFilename = 'ALT' . ($startId + $i);
            $qrCodePath1 = 'qrcodes/' . $qrCodeFilename . '.svg';

            file_put_contents(public_path($qrCodePath1), $qrCode);
            $qrCodePath = $qrCodeFilename;

            $qrCodePaths[] = $qrCodePath;

            $qrCodeTexts[] = $qrCodeText;
        }
        $paymentPages->qrCode = $qrCodeTexts;


        $startId += $quantity; // Tăng giá trị của $startId sau mỗi lần tạo mã QR code
        // Gán mảng đường dẫn mã QR code cho $paymentPages
        $paymentPages->qrCodePath = $qrCodePaths;
        $paymentPages->idqrCodePath = $startId;

        $paymentPages->save();
        $paymentPagesList = payment_pages::all(); // Lấy tất cả dữ liệu từ bảng payment_pages
        // Gửi email chứa mã QR

        $data = ['paymentPages' => $paymentPagesList, 'id' => $id, 'qrCodeTexts' => $qrCodeTexts];

        $successPaymentPage = view('SuccessPaymentpage')->with($data)->render();


        return $successPaymentPage;
    }
    // gửi mail
    public function sendEmail(Request $request, $id)
    {
        // Lấy thông tin thanh toán từ payment_pages
        $paymentPages = payment_pages::where('id_book_tickets', $id)->first();

        // Kiểm tra xem có bản ghi tồn tại hay không
        if (!$paymentPages) {
            return response()->json(['error' => 'Dữ liệu payment_pages không tồn tại'], 404);
        }

        // Đính kèm các mã QR vào email
        $qrCodePaths = json_decode($paymentPages->qrCode, true);
        // Gửi email chứa mã QR
        Mail::send('sendmail', compact('qrCodePaths'), function ($message) use ($paymentPages, $qrCodePaths) {
            $message->to($paymentPages->Email)->subject('Mã QR Code');
        });
        $paymentPages = payment_pages::all();

        return response()->json(['success' => 'Email đã được gửi thành công']);
    }


    // tải ảnh mã  qr
    public function downloadQRCodes($id)
    {
        $paymentPages = payment_pages::where('id_book_tickets', $id)->get();

        // Tạo đối tượng ZipArchive
        $zip = new ZipArchive();
        $zipFileName = 'qr_codes.zip';

        // Mở file zip để ghi
        if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            foreach ($paymentPages as $paymentPage) {
                foreach (json_decode($paymentPage->qrCodePath) as $qrCodePath) {
                    // Lấy đường dẫn đầy đủ của file QR
                    $qrCodeFullPath = public_path('qrcodes/' . $qrCodePath . '.svg');

                    // Thêm file QR vào file zip
                    $zip->addFile($qrCodeFullPath, $qrCodePath . '.svg');
                }
            }

            // Đóng file zip
            $zip->close();

            // Trả về response tải xuống file zip
            return response()->download($zipFileName)->deleteFileAfterSend(true);
        } else {
            // Xử lý lỗi khi không thể tạo file zip
            // ...
        }
    }


    //gửi mail liên hệ
    public function sendmailContact(Request $request)
    {
        $data = $request->validate([
            'Full_name' => 'required',
            'Tell' => 'required',
            'Email' => 'required|email',
            'Address' => 'required',
            'message' => 'required',
        ]);

        $contact = Contact::create([
            'Full_name' => $data['Full_name'],
            'Tell' => $data['Tell'],
            'Email' => $data['Email'],
            'Address' => $data['Address'],
            'message' => $data['message'],
        ]);

        // Tiếp tục xử lý khác sau khi đã lưu dữ liệu

        Mail::send('sendmailContact', compact('contact'), function ($message) use ($contact) {
            $message->to('trunghhf@gmail.com')->subject('tin nhắn từ người dùng');
        });

        return view('contactpage')->with('success', 'Dữ liệu đã được lưu và gửi thành công');
    }

    //show sự kiện
    public function show_Event()
    {
        $events = Event::all();



        return view('eventpage', compact('events'));
    }

    //show sự kiện chi tiết
    public function Event_Details($id)
    {
        $events = Event::find($id);

        if (!$events) {
            return response()->json(['error' => 'Dịch Vụ không tồn tại'], 404);
        }

        return view('EventDetailspage', compact('events'));
    }
}
