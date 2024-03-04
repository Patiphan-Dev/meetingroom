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
        <h1 class="pb-4 mb-3 fst-italic border-bottom">
            {{ $room->room_name }}
        </h1>
        <article class="blog-post mb-5">
            <h3>รายละเอียด</h3>
            {!! $room->room_details !!}
        </article>
        <div class="mb-5">
            <h3>แผนภาพหอประชุม</h3>
            @foreach ($diagram as $key => $img)
                <div class="text-center {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset($img) }}" class="img-fluid w-50" alt="...">
                </div>
            @endforeach
        </div>
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
        <div class="clearfix">
            <h5><i class="fa-solid fa-shield-halved"></i> สถานะ</h5>
            @if ($room->room_status == 1)
                <button class="btn btn-primary">ว่าง</button>
            @else
                <button class="btn btn-danger">ไม่ว่าง<button>
            @endif
        </div>
    </div>
</div>
