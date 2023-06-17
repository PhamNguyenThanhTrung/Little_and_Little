@extends('templates.teamplate')
@section('homepage')

<main>
    <div class="background">
        <div class="paymentpage pt-5">
            <img src="{{ asset( 'storage/app/public/assets/images/paymentpage/Trini_Arnold_Votay1 2.png') }}" alt="" class="img">


            <div class="title text-center mt-3">
                <h1>Thanh toán</h1>
            </div>
            <div class="paymentpage-form-container">
                <div class="booking-information">
                    <div class="title d-flex align-items-center justify-content-center">
                        <h1>VÉ CỔNG - VÉ GIA ĐÌNH</h1>
                    </div>
                    <div class="book-form">
                        <form action="">
                            <div class="d-flex justify-content-between">
                                <div class="payment-amount">
                                    <span>Số tiền thanh toán</span>
                                    <input type="text" name="paymentamount" value="{{ $book_tickets->Quantity*300000 }}" id="">
                                </div>
                                <div class="number-of-tickets">
                                    <span>Số lượng vé</span>
                                    <div class="d-flex">
                                        <input type="text" name="numberoftickets" value="{{ $book_tickets->Quantity }}" id="">&ensp;<span>vé</span>
                                    </div>
                                </div>
                                <div class="date">
                                    <span>Ngày sử dụng</span>
                                    <input type="text" name="date" value="{{ $book_tickets->Date_of_use }}" id="">
                                </div>
                                </div>
                                <div class="contact-info">
                                    <span>Thông tin liên hệ</span>
                                    <input type="text" name="contactinfo" value="{{ $book_tickets->Full_name }}" id="">
                                </div>
                                <div class="phone">
                                    <span>Điện thoại</span>
                                    <input type="text" name="phone" value="{{ $book_tickets->Tell }}" id="">
                                </div>
                                <div class="email">
                                    <span>Email</span>
                                    <input type="text" name="email" value="{{ $book_tickets->Email }}" id="">
                                </div>

                        </form>
                    </div>
                </div>
                <style>


                </style>

                <div class="billing-information">
                    <div class="title d-flex align-items-center justify-content-center">
                        <h1>THÔNG TIN THANH TOÁN</h1>
                    </div>
                    <div class="bill-form">
                        <form action="{{ route('paymentPage.storePaymentData', ['id' => $book_tickets->id]) }}" method="POST">
                            @csrf
                            <div>
                                <span>Số thẻ</span>
                                <div class="input-wrapper">
                                    <input type="text" name="Card_number" id=""
                                        placeholder="@error('Card_number') &#x26A0; @enderror"
                                        class="input-field">
                                </div>

                            </div>

                            <div>
                                <span>Họ tên chủ thẻ</span>
                                <div class="input-wrapper">
                                    <input type="text" name="Full_name_owner" id=""
                                        placeholder="@error('Full_name_owner') &#x26A0; @enderror"
                                        class="input-field">
                                </div>
                            </div>

                            <div class="expiration-date">
                                <span>Ngày hết hạn</span>
                                <div class="d-flex justify-content-between">
                                    <input type="text" name="Expiration_date" id="date"
                                        class="input-field" placeholder="@error('Expiration_date') &#x26A0; @enderror">
                                    <button type="button" class="button-3d" id="dateButton">
                                        <img src="{{ asset('storage/app/public/assets/images/icon/Vector.png') }}" alt="">
                                    </button>
                                </div>
                            </div>

                            <div class="cvv-cvc">
                                <span>CVV/CVC</span>
                                <div class="input-wrapper">
                                    <input type="text" name="Security_code" id=""
                                        placeholder="@error('Security_code') &#x26A0; @enderror"
                                        class="input-field">
                                </div>
                            </div>

                            <div class="text-center mt-3">
                                <button class="button-submit" type="submit">Thanh toán</button>
                            </div>

                            @if ($errors->any())
                                <script>
                                    $(document).ready(function() {
                                        $('#staticBackdrop4').modal('show'); // Hiển thị popup modal khi có lỗi
                                    });
                                </script>
                            @endif

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="modal fade" id="staticBackdrop4" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                 <img src="{{ asset( 'assets/images/icon/sad.png') }}" alt="" class="img">
                 <br>

            </div>
            <div class="modal-footer">

                <p>Hình như đã có lỗi xảy ra khi thanh toán...<br>
                    Vui lòng kiểm tra lại thông tin liên hệ, thông tin thẻ và thử lại.</p>
            </div>
        </div>
    </div>
</div>
<script>



</script>
@endsection
