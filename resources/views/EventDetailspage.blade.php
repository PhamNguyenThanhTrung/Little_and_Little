@extends('templates.teamplate')
@section('eventpage')
    <main>
        <div class="background">
            <div class="decorate">
                <img src="{{ asset('assets/images/eventpage/event_1.png') }}" alt="">
                <img src="{{ asset('assets/images/eventpage/event_2.png') }}" alt="">
            </div>
            <div class="eventpage pt-5">
                <div class="title text-center mt-3">
                    <h1>{{ $events->Name_Event }}</h1>
                </div>
                <div class="eventdetailspage d-flex align-items-center justify-content-center">
                    <div class="row">
                        <div class="col-4">
                            <div class="card w-100 h-100">
                                <img class="card-img-top" src="{{ asset('assets/images/eventpage/Rectangle 3.png') }}"
                                    alt="">
                                <div class="card-body">
                                    <h4 class="card-date">
                                        <img src="{{ asset('assets/images/icon/calendar.png') }}" alt="">&ensp;
                                        {{ $events->Start_date }} - {{ $events->Expiration_date }}
                                    </h4>
                                    <h4 class="card-text">{{ $events->Location }}</h4>
                                    <h4 class="card-price">{{ $events->price }} VNĐ</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="content">
                              
                                <span>
                                    <a class="orange-text">Lorem Ipsum</a> is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum
                                    has been the industry's standard dummy text ever since the 1500s, when an unknown
                                    printer took a galley of type and scrambled it to make a type specimen book. It has

                                    unchanged. It was popularised in the 1960s with the release
                                    of Letraset<div class="card w-100 h-100">
                                        <img class="card-img-top"
                                            src="{{ asset('assets/images/eventpage/' . $events->Image) }}" alt="">
                                    </div> sheets containing Lorem Ipsum passages, of Lorem Ipsum.
                                    Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin
                                    literature from 45 BC, making it over 2000 years old. words, consectetur, from a Lorem
                                    Ipsum passage, and going through the cites of the word in classical literature,
                                    Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin Ipsum
                                    passage, and going through the cites of the word in classical literature,
                                    <div class="card w-100 h-100">
                                        <img class="card-img-top"
                                            src="{{ asset('assets/images/eventpage/' . $events->Image) }}" alt="">
                                    </div>
                                </span>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
