@extends('layout')
@section('body')
    <div class="row text-center mt-4">
        <h1>ตารางการใช้งานหอประชุม</h1>
        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
            tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Modal 1</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open
                            second modal</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
            tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Modal 2</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to
                            first</button>
                        <button class="btn btn-primary" data-bs-target="#exampleModalToggle3"
                            data-bs-toggle="modal">สร้างการจอง</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalToggle3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
            tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Modal 3</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Back to
                            first</button>
                        <button class="btn btn-primary" data-bs-target="#exampleModalToggle4"
                            data-bs-toggle="modal">สร้างการจอง</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalToggle4" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
            tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel4">Modal 4</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-target="#exampleModalToggle3" data-bs-toggle="modal">Back to
                            first</button>
                        <button class="btn btn-primary" data-bs-target="#exampleModalToggle5"
                            data-bs-toggle="modal">สร้างการจอง</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">สร้างการจอง</button> --}}
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
                        <a class="col-md-8 nav-link" href="{{ route('getRoom', ['id' => $room->id]) }}">
                            <div class="card-body">
                                <h2 class="card-title"><b>{{ $room->room_name }}</b></h2>
                                <p class="card-text">{!! $room->room_details !!}</p>
                            </div>
                        </a>
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
