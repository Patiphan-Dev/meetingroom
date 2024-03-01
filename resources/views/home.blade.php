@extends('layout')
@section('body')
    <div class="row text-center mt-4">
        <h1>ตารางการใช้งานหอประชุม</h1>
    </div>
    @if ($rooms != null || $rooms != '')
        <div class="row mt-4">
            @foreach ($rooms as $i => $room)
                <div class="card mb-5">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <div id="carousel{{ $i }}" class="carousel slide">
                                <div class="carousel-inner">
                                    @php
                                        $image = explode(',', $room->room_img_path);
                                    @endphp
                                    @foreach ($image as $key => $img)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <img src="{{ asset($img) }}" class="img-fluid w-100" alt="...">
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carousel{{ $i }}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carousel{{ $i }}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class="card-title"><b>{{ $room->room_name }}</b></h2>
                                <p class="card-text">{!! $room->room_details !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    <hr>
    <div class="row">
        @if ($rules != null)
            {!! $rules->rule_detail !!}
        @endif
    </div>
@endsection
