<div class="row justify-content-center">
    <div id="carousel{{ $room->id }}" class="carousel slide mb-3">
        <div class="carousel-inner">
            @foreach ($image as $key => $img)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset($img) }}" class="img-fluid w-100" alt="...">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $room->id }}"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $room->id }}"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="px-4">
        <h4 class="pb-4 mb-3 fst-italic border-bottom">
            {{ $room->room_name }} ราคา {{ $room->room_price }} บาท / ชั่วโมง
        </h4>
        <article class="blog-post mb-3">
            <h3>รายละเอียด</h3>
            {!! $room->room_details !!}
        </article>
        <article class="blog-post mb-3">
            <h3>สิ่งอำนวยความสะดวก</h3>
            {!! $room->room_facilities !!}
        </article>
        <div class="clearfix">
            <h5><i class="fa-solid fa-shield-halved"></i> สถานะ</h5>
            @if ($room->room_status == 1)
                <button class="btn btn-primary">เปิดใช้บริการสนาม</button>
            @else
                <button class="btn btn-danger">ปิดใช้บริการสนาม</button>
            @endif
        </div>
    </div>
</div>
