@extends('layout')
@section('body')
    <div class="row">
        <div id="carouselrooms" class="carousel slide">
            <div class="row">
                <div class="col-3 overflow-y-auto mt-3">
                    <div class="carousel-indicators">
                        @foreach ($rooms as $key => $room)
                            @php
                                $image = explode(',', $room->room_img_path);
                            @endphp
                            <img src="{{ asset($image[0]) }}" data-bs-target="#carouselrooms"
                                data-bs-slide-to="{{ $key }}"
                                class="rounded img-thumbnail {{ $key == 0 ? 'active' : '' }}" aria-current="true"
                                aria-label="Slide {{ $key }}">
                        @endforeach
                    </div>
                </div>
                <div class="col-9">
                    <div class="carousel-inner">
                        @foreach ($rooms as $key => $room)
                            @php
                                $image = explode(',', $room->room_img_path);
                            @endphp
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img src="{{ asset($image[0]) }}" class="rounded img-thumbnail d-block w-100"
                                    alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h2>{{ $room->room_name }}</h2>
                                    <h4>{{ $room->room_price }} / ชั่วโมง</h4>

                                    {{-- <a href="{{ route('booking', ['id' => $room->id]) }}" class="btn btn-warning btn-sm">
                                        <i class="fa-solid fa-check"></i> จองสนาม
                                    </a>
                                    <a href="{{ route('getroom', ['id' => $room->id]) }}"
                                        class="btn btn-primary btn-sm getroom"> ดูข้อมูลเพิ่มเติม
                                    </a> --}}
                                </div>

                            </div>
                        @endforeach

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselrooms"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselrooms"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-center mt-3">
                        <a href="{{ route('booking', ['id' => $room->id]) }}" class="btn btn-warning btn-sm d-block">
                            <i class="fa-solid fa-check"></i> จองสนาม
                        </a>
                        <a href="{{ route('getroom', ['id' => $room->id]) }}"
                            class="btn btn-primary btn-sm getroom d-block">
                            ดูข้อมูลเพิ่มเติม
                        </a>
                    </div>
                </div>

            </div>


        </div>

    </div>
    <hr>
    <div class="row">
        @if ($rules != null)
            {!! $rules->rule_detail !!}
        @endif
    </div>
@endsection
