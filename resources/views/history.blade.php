@extends('layout')
@section('body')
<style>
    .img_bk_slip2 {
        max-width: 280px;
        border: 1px solid #88888850;
        border-radius: 6px;
        padding: 6px;
        width: 50vw;
        height: 40vh;
        background-color: rgb(255, 242, 228);
        align-items: center;
        text-align: center
    }
</style>
    <div class="card mt-5 my-5">
        <div class="card-body mt-3">
            <h3 class="strong">รายงานการจองหอประชุม</h3>
            <table class="display responsive  nowrap" id="historyTable" style="width:100%">
                <thead>
                    <tr class="text-center">
                        <th scope="col">หอประชุม</th>
                        <th scope="col">วันที่จอง</th>
                        <th scope="col">เวลาจอง</th>
                        <th scope="col">เงินมัดจำ</th>
                        <th scope="col">ค่าใช้จ่าย</th>
                        <th scope="col">ราคารวม</th>
                        <th scope="col">สถานะ</th>
                        <th scope="col">วันที่ทำรายการ</th>
                        <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($history as $key => $row)
                        <tr>
                            <td>{{ $row->room_name }}{{ $row->id }}</td>
                            <td>{{ $row->bk_str_date }} ถึง {{ $row->bk_end_date }}</td>
                            <td>{{ $row->bk_str_time }} ถึง {{ $row->bk_end_time }}</td>
                            <td class="text-end">{{ $row->damage_insurance }}.00</td>
                            <td class="text-end">
                                {{ $row->maintenance + $row->utilities + $row->officer_compensation + $row->other_expenses }}.00
                            </td>
                            <td class="text-end">{{ $row->total }}.00</td>
                            <td class="text-center">

                                @if ($row->bk_status == 1)
                                    <span class="badge text-bg-warning"> รอชำระเงิน</span>
                                @elseif ($row->bk_status == 2)
                                    <span class="badge text-bg-info"> รอตรวจสอบ</span>
                                @elseif ($row->bk_status == 3)
                                    <span class="badge text-bg-primary"> อนุมัติ</span>
                                @elseif ($row->bk_status == 4)
                                    <span class="badge text-bg-success"> สำเร็จ</span>
                                @else
                                    <span class="badge text-bg-danger"> ยกเลิก</span>
                                @endif
                            </td>
                            <td>{{ $row->created_at }}</td>
                            <td>
                                <a type="button" data-bs-toggle="modal" data-bs-target="#slip{{ $row->room_name }}" class="btn badge text-bg-info">
                                    <i class="fa-solid fa-money-bill-transfer"></i>
                                </a>
                                <div class="modal fade" id="slip{{ $row->room_name }}" tabindex="-1"
                                    aria-labelledby="slip{{ $row->room_name }}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="slip{{ $row->room_name }}Label">
                                                    หลักฐานค่าบริการ {{ $row->room_name }}
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('PayService', ['id' => $row->id]) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="col-12 text-center mt-3">
                                                        <img id="img_bk_slip2{{ $row->id }}" alt="อัพโหลดสลิปโอนเงิน"
                                                            @if ($row->bk_slip2 != null) src="{{ asset($row->bk_slip2) }}" @endif
                                                            class="mx-auto d-block img-thumbnail mb-3 img_bk_slip2">
                                                        <input type="file" id="bk_slip2{{ $row->id }}"
                                                            name="bk_slip2" class="form-control mb-3"
                                                            accept="image/png, image/jpeg"
                                                            onchange="displayImage('{{ $row->id }}')">
                                                    </div>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">ปิด</button>
                                                    <input type="submit" class="btn btn-primary" value="บันทึก">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('getRoom', ['id' => $row->bk_room_id, 'step' => 2, 'booking_id' => $row->id]) }}"
                                    class="btn badge text-bg-warning">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <button type="button" class="btn badge text-bg-danger"
                                    onclick="deleteBooking('{{ $row->id }}')">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.4.1/js/dataTables.rowReorder.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#historyTable").DataTable({
                responsive: true,
            });
        });

        function deleteBooking(id) {
            Swal.fire({
                title: "คุณแน่ใจไหม?",
                text: "คุณจะไม่ได้รับเงินมัดจำคืนหากยกเลิก!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "แน่ใจ!",
                cancelButtonText: "ยกเลิก"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '/deletebooking/' + id,
                        method: 'POST',
                        data: {
                            id: id
                        },
                        success: function(response) {
                            Swal.fire({
                                title: "ลบแล้ว!",
                                text: "ยกเลิกการจองของคุณแล้ว.",
                                icon: "success"
                            }).then(() => {
                                // Reload the page after successful deletion
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: "ลบไม่สำเร็จ!",
                                text: "ไฟล์ของคุณยังไม่ถูกลบ.",
                                icon: "error"
                            });
                            console.log("AJAX Request Error:", status, error);
                        }
                    });

                }
            });
        }
    </script>
  <script>
    function displayImage(id) {
        console.log(id);
        const input = document.getElementById("bk_slip2" + id);
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const imageDataUrl = event.target.result;
                updateImageSrc(imageDataUrl, id);
            };
            reader.onerror = function(error) {
                console.error("Error:", error)
            };
            reader.readAsDataURL(file);
        }
    }

    function updateImageSrc(imageDataUrl, id) {
        const imageElement = document.getElementById("img_bk_slip2" + id);
        imageElement.src = imageDataUrl;
    }
</script>
@endsection
