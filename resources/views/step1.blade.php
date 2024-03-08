<div class="row mb-4 mt-5" id="step1">
    <h1 class="p-4 mb-4 text-center border-top border-bottom">
        <b>{{ $room->room_name }}</b>
    </h1>

    <div id="carouselRoom" class="carousel slide">
        <div class="row">
            <div class="col-12 col-md-9">
                <div class="carousel-inner">
                    @php
                        $image = explode(',', $room->room_img_path);
                    @endphp
                    @foreach ($image as $key => $img)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset($img) }}" class="d-block w-100" alt="...">
                        </div>
                    @endforeach

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselRoom"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselRoom"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-12 col-md-3 overflow-y-auto mt-2">
                @php
                    $diagram = explode(',', $room->room_diagram_path);
                @endphp
                @foreach ($diagram as $key => $img)
                    <img src="{{ asset($img) }}" class="d-blox w-100 align-items-end {{ $key == 0 ? 'active' : '' }}">
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="row mb-5">
    <div class="col-md-10 mb-3">
        <div class="card">
            <div class="card-body">
                <article class="blog-post">
                    <h3>รายละเอียด</h3>
                    {!! $room->room_details !!}
                </article>
                <article class="blog-post" style="overflow-x:auto;">
                    <table class="table table-bordered border-primary">
                        <thead class="text-center">
                            <th>ค่าบำรุงสถานที่</th>
                            <th>ค่าสารณูปโภค</th>
                            <th>ค่าตอบแทนเจ้าหน้าที่</th>
                            <th>ค่าใช้จ่ายอื่นๆ</th>
                            <th>ค่าใช้จ่ายรวม</th>
                            <th>ค่าประกันความเสียหาย</th>
                        </thead>
                        <tbody>
                            <td class="text-end">{{ $room->maintenance }}</td>
                            <td class="text-end">{{ $room->utilities }}</td>
                            <td class="text-end">{{ $room->officer_compensation }}</td>
                            <td class="text-end">{{ $room->other_expenses }}</td>
                            <td class="text-end">{{ $room->total }}</td>
                            <td class="text-end">{{ $room->damage_insurance }}</td>
                        </tbody>
                    </table>
                </article>
            </div>
        </div>
    </div>
    <div class="col-md-2 text-center">
        <div class="position-sticky" style="top: 8.5rem;">
            <h1 class="fst-italic">
                <a href="{{ route('addBooking', ['id' => $room->id]) }}" class="btn btn-warning btn-md create_booking"
                    id="create_booking{{ $room->id }}"><b> <i class="fa-solid fa-check"></i> สร้างการจอง</b></a>
            </h1>
        </div>
    </div>
</div>
