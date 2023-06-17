<header class="fixed-top">
    <div class="row d-flex align-items-center h-100 text-center">
        <div class="col">
            <a href="{{ url('/HomePage') }}"><img src="{{asset('storage/app/public/assets/images/Little & Little Logo.png')}}" alt="" class="logo"></a>
        </div>
        <div class="col">
            <div class="row">
                <div class="col d-flex align-items-center justify-content-center">
                    <a href="{{ url('/HomePage') }}">Trang chủ</a>
                </div>
                <div class="col d-flex align-items-center justify-content-center">
                    <a href="{{ url('/EventPage') }}">Sự kiện</a>
                </div>
                <div class="col d-flex align-items-center justify-content-center">
                    <a href="{{ url('/ContactPage') }}">Liên hệ</a>
                </div>
            </div>
        </div>
        <div class="col">
            <a href="{{ url('/contact') }}" class="d-inline-flex align-items-center">
                <div class="border border-2 d-flex align-content-between p-2 rounded-circle">
                    <img   src="{{asset('storage/app/public/assets/images/Vector (Stroke).png')}}" alt="contact">

                </div>
                &ensp;012345678910
            </a>
        </div>
    </div>
</header>
