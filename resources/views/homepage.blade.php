@extends('templates.teamplate')
@section('homepage')

<main>

    <div class="background">
        <div class="homepage">
            <div class="imgs">
                <img src="{{ asset( 'assets/images/homepage/18451 [Converted]-02 1.png') }}" alt="" class="img-1">
                <img src="{{ asset( 'assets/images/homepage/18451 [Converted]-03 1.png') }}" alt="" class="img-2">
                <img src="{{ asset( 'assets/images/homepage/18451 [Converted]-03 1.png') }}" alt="" class="img-3">
                <img src="{{ asset( 'assets/images/homepage/18451 [Converted]-04 1.png') }}" alt="" class="img-4">
                <img src="{{ asset( 'assets/images/homepage/18451 [Converted]-05 1.png') }}" alt="" class="img-5">
                <img src="{{ asset( 'assets/images/homepage/18451 [Converted]-06 1.png') }}" alt="" class="img-6">
                <img src="{{ asset( 'assets/images/homepage/Lisa_Arnold_Lay_Do_F2 3.png') }}" alt="" class="img-7">
                <img src="{{ asset( 'assets/images/homepage/render fix hair 1.png') }}" alt="" class="img-8">

            </div>
            <div class="content d-flex align-items-center" style=" font-family: "VNCOOP";">
                <img src="{{ asset( 'assets/images/homepage/image 2.png') }}" alt="">
                <span style="font-family: 'Pacifico';">ĐẦM SEN <br> PARK</span>


            </div>
            <div class="home-form-container">
                <div class="title d-flex align-items-center justify-content-center">
                    <span>VÉ CỦA BẠN</span>

                </div>
                <div class="news">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod voluptatem excepturi, sunt
                        aliquid dolorem</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod voluptatem excepturi, sunt
                        aliquid dolorem</p>
                    <div class="starts ms-4">
                        <p><img src="{{ asset( 'assets/images/homepage/Start.png') }}"  alt=""> Lorem ipsum dolor sit amet
                            consectetur adipisicing elit.</p>
                        <p><img src="{{ asset( 'assets/images/homepage/Start.png') }}" alt=""> Lorem ipsum dolor sit amet
                            consectetur adipisicing elit.</p>
                        <p><img src="{{ asset( 'assets/images/homepage/Start.png') }}" alt=""> Lorem ipsum dolor sit amet
                            consectetur adipisicing elit.</p>
                        <p><img src="{{ asset( 'assets/images/homepage/Start.png') }}" alt=""> Lorem ipsum dolor sit amet
                            consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="form px-3">
                    <form class="text-center" action="{{ route('HomePage.book_tickets') }}" method="POST">
                        @csrf
                        <div class="package d-flex">
                            <select name="Ticket_type" id="package">
                                <option value="family">Gói gia đình</option>
                                <option value="individual">Gói cá nhân</option>
                            </select>
                            <button type="button" class="button-3d">
                                <img src="{{ asset( 'assets/images/icon/Arrow - Down 2.png') }}"  alt="">
                            </button>
                        </div>
                        @error('Ticket_type')
                            <div class="error">{{ $message }}</div>
                        @enderror

                        <div class="tickets d-flex justify-content-between">
                            <input type="number" name="Quantity" id="ticket" placeholder="Số lượng vé" class="ticket no-spinners">

                            <input type="text" name="Date_of_use" id="date" placeholder="Ngày sử dụng" class="date">

                            <button type="button" class="button-3d" id="dateButton">
                                <img src="{{ asset( 'assets/images/icon/Vector.png') }}" alt="">
                            </button>
                            <style>
                                .error {
                                    color: red;
                                }
                            </style>
                        </div>
                        <div class="name">
                            <input type="text" name="Full_name" id="name" placeholder="Họ và tên">

                        </div>
                        <div class="phonenumber">
                            <input type="number" name="Tell" id="phonenumber" placeholder="Số điện thoại" class="no-spinners">

                        </div>
                        <div class="email">
                            <input type="email" name="Email" id="email" placeholder="Địa chỉ email">

                        </div>
                        <button class="button-submit" type="submit">Đặt vé</button>
                    </form>

                    @if ($errors->any())
                    <script>
                        $(document).ready(function() {
                            $('#staticBackdrop5').modal('show'); // Hiển thị popup modal khi có lỗi
                        });
                    </script>
                @endif

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="staticBackdrop5" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-footer">
                    <h2>thông tin không chính xác</h2>
                </div>
            </div>
        </div>
    </div>
    @if(isset($success))
    <script>
        alert('{{$success}}');

    </script>
@endif

<script></script>
</main>
<?php
echo gd_info()['GD Version'];

?>

@endsection
