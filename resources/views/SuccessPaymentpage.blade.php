@extends('templates.teamplate')
@section('homepage')
    <main>
        <div class="background">
            <div class="successfulpaymentpage pt-5">
                <img src="assets/images/successfulpaymentpage/Alvin_Arnold_Votay1 1.png" alt="" class="img">
                <div class="title text-center mt-3">
                    <h1>Thanh toán thành công</h1>
                </div>
                <div class="successfulpaymentpage-form-container">
                    <div class="carousel-wrapper d-flex align-items-center">
                        <button type="button" class="prev-btn button-3d ms-4">
                            <img src="{{ asset( 'assets/images/icon/Arrow - Down 2.png') }}" alt="">
                        </button>
                        <div class="carousel h-100">
                            @foreach ($paymentPages as $paymentPage)
                                @if ($paymentPage->id_book_tickets == $id)
                                    @foreach (json_decode($paymentPage->qrCodePath) as $index => $qrCodePath)
                                        <div class="item">
                                            <div class="ticket">
                                                @php
                                                    $ticketCode = 'ALT00' . $qrCodePath;
                                                    $qrCodeImagePath = asset('public/qrcodes/' . $qrCodePath . '.svg');
                                                @endphp
                                                <a href="{{ $qrCodeImagePath }}" download="{{ $ticketCode }}">
                                                    <img src="{{ $qrCodeImagePath }}" alt="" class="qr">
                                                </a>
                                                <div class="ticket-code">{{ $qrCodeTexts[$index] }}</div>
                                                {{-- Hiển thị giá trị QR code text --}}
                                                <h1>VÉ CỔNG</h1>
                                                <p>---</p>
                                                <h4>Ngày sử dụng: {{ $paymentPage->Expiration_date }}</h4>
                                                <img src="{{ asset('storage/app/public/assets/images/successfulpaymentpage/tick 1.png') }}"
                                                    alt="" class="tick">
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            @endforeach





                        </div>
                        <button type="button" class="next-btn button-3d me-4">
                            <img src="{{ asset( 'assets/images/icon/Arrow - Down 2.png') }}"  alt="">
                        </button>
                    </div>
                    <div class="container d-flex justify-content-between mt-4">
                        @foreach ($paymentPages as $paymentPage)
                            @if ($paymentPage->id_book_tickets == $id)
                                @php
                                    $quantity = $paymentPage->Quantity;
                                @endphp
                            @endif
                        @endforeach
                        <h1 class="ticket-count">Số lượng: {{ $quantity }} vé</h1>
                        <h1 class="current-page">Trang 1</h1>
                    </div>



                </div>
                <div class="download-email-buttons">
                    <a href="{{ route('download.qrcodes', ['id' => $id]) }}" class="button-submit button_xn" onclick="return confirmDownload(event)">Tải vé</a>

                    <!-- Trong file blade template -->
                    <a href="{{ route('sendEmail.qrcodes', ['id' => $id]) }}" class="button-submit button_xn" onclick="return sendEmail1(event)">
                        Gửi email
                    </a>



                </div>
            </div>

            <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h1>Tải thành công</h1>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="staticBackdrop2" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h1>Gửi mail thành công</h1>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="staticBackdrop1" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h1>vui lòng chờ trong giây lát</h1>
                        </div>
                        <div class="modal-footer">
                            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h1>lỗi</h1>
                        </div>
                        <div class="modal-footer">
                            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button> --}}
                        </div>
                    </div>
                </div>
            </div>
    </main>



@endsection
