<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

    //hiển thị trang homepage
Route::get('/HomePage', function () {
    return view('homepage');
});
//đặt vé
Route::post('/HomePage', [myController::class, 'book_tickets'])->name('HomePage.book_tickets');


// hiển thị thanh toán
Route::get('/PaymentPage', function () {
    return view('paymentpage');
});
//edit thanh toán
Route::get('/PaymentPage/{id}/edit', [myController::class, 'edit_Payment'])->name('PaymentPage.edit_Payment');

//Thanh toán
Route::match(['get', 'post'], '/SuccessPayment/{id}/qrcodes', [myController::class, 'storePaymentData'])->name('paymentPage.storePaymentData');

//hiển thị trang thanh toán thành công
Route::get('/SuccessPayment', function () {
    return view('SuccessPaymentpage');
});

//tải mã QR
Route::get('/SuccessPayment/{id}/download', [myController::class, 'downloadQRCodes'])->name('download.qrcodes');

//Gửi mail mã qr
Route::get('/SuccessPayment/{id}/sendmail', [myController::class, 'sendEmail'])->name('sendEmail.qrcodes');

Route::get('/EventPage', function () {
    return view('eventpage');
});

// hiển thị trang liên hệ
Route::get('/ContactPage', function () {
    return view('contactpage');
});
//gửi mail trang liên hệ
Route::post('/ContactPage', [myController::class, 'sendmailContact'])->name('sendEmail.Contact');

//hiển thị trang sự kiện
Route::get('/EventPage', [myController::class, 'show_Event'])->name('Event.show_Event');

//chi tiết trang chi tiết sự kiện
Route::get('/Event_Details/{id}', [myController::class, 'Event_Details'])->name('Event.Details');









