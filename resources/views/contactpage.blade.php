@extends('templates.teamplate')
@section('contactpage')
<main>
    <div class="background">
        <div class="contactpage pt-5">
            <img src="assets/images/contactpage/Alex_AR_Lay_Do shadow 1.png" alt="" class="img">
            <div class="title text-center mt-3">
                <h1>Liên hệ</h1>
            </div>
            <div class="contact-form-container d-flex justify-content-center">
                <div class="row w-100">
                    <div class="col-8 d-flex justify-content-center align-items-center">
                        <div class="contact-form">
                            <span>
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam numquam
                                accusantium reiciendis sunt, officiis suscipit modi rem architecto, officia maiores
                                doloremque cum!
                            </span>


                                <form class="text-center" action="{{ route('sendEmail.Contact') }}" method="POST">
                                    @csrf

                                    <div class="form-row">
                                        <input type="text" name="Full_name" id="name" placeholder="Họ và tên" class="input-small">
                                        @error('Full_name')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                        <input type="email" name="Email" id="email" placeholder="Địa chỉ email" class="input-large">
                                        @error('Email')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-row">
                                        <input type="number" name="Tell" id="phonenumber" placeholder="Số điện thoại"
                                            class="input-small no-spinners">
                                        @error('Tell')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                        <input type="text" name="Address" id="address" placeholder="Địa chỉ" class="input-large" >
                                        @error('Address')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <textarea id="" cols="30" rows="5" name="message" id="message" placeholder="Tin nhắn"
                                        class="locked-textarea"></textarea>
                                    @error('message')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                    {{-- <button class="button-submit" type="submit">Gửi liên hệ</button> --}}
                                    <a href="" class="button-submit">
                                        <button class="button-submit" >Gửi Liên hệ</button></a>
                                        @if(isset($success))
                                        <script>
                                            $(document).ready(function() {
                                                $('#contact').modal('show'); // Hiển thị popup modal khi có lỗi
                                            });
                                        </script>
                                    @endif

                                </form>
                                
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="contact-info-container">
                            <div class="contact-info">
                                <img src="assets/images/icon/adress 1.png" alt="adress">
                                <div>
                                    <h1>Địa chỉ:</h1>
                                    <span>86/33 Âu Cơ, Phường 9, Quận Tân Bình, TP. Hồ Chí Minh</span>
                                </div>
                            </div>
                            <div class="contact-info">
                                <img src="assets/images/icon/mail-inbox-app 1.png" alt="mail">
                                <div>
                                    <h1>Email:</h1>
                                    <span>investigate@your-site.com</span>
                                </div>
                            </div>
                            <div class="contact-info">
                                <img src="assets/images/icon/telephone 2.png" alt="telephone">
                                <div>
                                    <h1>Điện thoại</h1>
                                    <span>+84 111 222 333</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="modal fade" id="contact" tabindex="-1" aria-labelledby="staticBackdropLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-body1">

            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">X</button>
        </div>
        <div class="modal-footer">


            <p>Gửi liên hệ thành công.<br>
                Vui lòng kiên nhẫn đợi phản hồi từ chúng tôi, bạn nhé!</p>
        </div>
    </div>
</div>
</div>

@endsection
