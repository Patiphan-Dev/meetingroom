@extends('admin.layout')

@section('body')
    {{-- <div class="d-grid gap-2 d-md-flex justify-content-end">
       <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addroom">
            <i class="fa-solid fa-plus"></i> จองหอประชุม
        </button>
        <div class="modal fade" id="addroom" aria-hidden="true" aria-labelledby="addroomLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addroomLabel">จองหอประชุม</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('formBooking')
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row mt-3">
        <h3 class="strong">รายงานการจองหอประชุม</h3>
        <table class="display responsive  nowrap" id="reserveTable" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">หอประชุม</th>
                    <th scope="col">ชื่อผู้จอง</th>
                    <th scope="col">วันที่จอง</th>
                    <th scope="col">เวลาจอง</th>
                    <th scope="col">สถานะ</th>
                    <th scope="col">วันที่ทำรายการ</th>
                    <th scope="col">#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $key => $row)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $row->room_name }}</td>
                        <td>{{ $row->fullname }}</td>
                        <td>{{ $row->bk_str_date }} ถึง {{ $row->bk_end_date }}</td>
                        <td>{{ $row->bk_str_time }} ถึง {{ $row->bk_end_time }}</td>
                        <td class="text-center"> 
                            <a type="button" data-bs-toggle="modal" data-bs-target="#status{{ $row->room_name }}">
                                @if ($row->bk_status == 1)
                                    <span class="badge w-100 text-bg-warning"> รอชำระเงิน</span>
                                @elseif ($row->bk_status == 2)
                                    <span class="badge w-100 text-bg-info"> รอตรวจสอบ</span>
                                @elseif ($row->bk_status == 3)
                                    <span class="badge w-100 text-bg-primary"> อนุมัติ</span>
                                @elseif ($row->bk_status == 4)
                                    <span class="badge w-100 text-bg-success"> สำเร็จ</span>
                                @else
                                    <span class="badge w-100 text-bg-danger"> ยกเลิก</span>
                                @endif
                            </a>
                            <div class="modal fade" id="status{{ $row->room_name }}" tabindex="-1"
                                aria-labelledby="status{{ $row->room_name }}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="status{{ $row->room_name }}Label">สถานะการอจอง
                                                {{ $row->room_name }}
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('updateReserve', ['id' => $row->id]) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row justify-content-center g-2">
                                                    <div class="col-12 col-md-6">
                                                        <div class="btn btn-success w-100">
                                                            <input class="form-check-input" type="radio" name="bk_status"
                                                                id="4Radio{{ $row->username . $row->id }}" value="4"
                                                                onclick="Confirm('{{ $row->id }}')"
                                                                @if ($row->bk_status == '4' || $row->bk_status == null) checked @endif>
                                                            <label class="form-check-label"
                                                                for="4Radio{{ $row->username . $row->id }}">สำเร็จ</label>

                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="btn btn-primary w-100">
                                                            <input class="form-check-input" type="radio" name="bk_status"
                                                                id="3Radio{{ $row->username . $row->id }}" value="3"
                                                                onclick="Confirm('{{ $row->id }}')"
                                                                @if ($row->bk_status == '3' || $row->bk_status == null) checked @endif>
                                                            <label class="form-check-label"
                                                                for="3Radio{{ $row->username . $row->id }}">อนุมัติ</label>

                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="btn btn-info w-100">
                                                            <input class="form-check-input" type="radio" name="bk_status"
                                                                id="2Radio{{ $row->username . $row->id }}" value="2"
                                                                onclick="NoConfirm('{{ $row->id }}')"
                                                                @if ($row->bk_status == '2') checked @endif>
                                                            <label class="form-check-label"
                                                                for="2Radio{{ $row->username . $row->id }}">รอตรวจสอบ</label>

                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="btn btn-warning w-100">

                                                            <input class="form-check-input" type="radio" name="bk_status"
                                                                id="1Radio{{ $row->username . $row->id }}" value="1"
                                                                onclick="NoConfirm('{{ $row->id }}')"
                                                                @if ($row->bk_status == '1') checked @endif>
                                                            <label class="form-check-label"
                                                                for="1Radio{{ $row->username . $row->id }}">รอชำระเงิน</label>

                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="btn btn-danger w-100">

                                                            <input class="form-check-input" type="radio" name="bk_status"
                                                                id="0Radio{{ $row->username . $row->id }}" value="0"
                                                                onclick="NoConfirm('{{ $row->id }}')"
                                                                @if ($row->bk_status == '0') checked @endif>
                                                            <label class="form-check-label"
                                                                for="0Radio{{ $row->username . $row->id }}">ไม่อนุมัติ</label>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3 mt-3">
                                                    <div id="bk_node{{ $row->id }}" hidden>
                                                        <label class="mb-2" for="bk_node">
                                                            หมายเหตุ <span>*</span>
                                                        </label>
                                                        <textarea id="bk_node{{ $row->id }}" class="form-control" name="bk_node" rows="3" cols="40">{{ $row->bk_node }}</textarea>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ปิด</button>
                                                <input type="submit" class="btn btn-primary" value="บันทึก">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $row->created_at }}</td>
                        <td>

                            <a href="{{ route('viewReserve', ['id' => $row->id]) }}" class="btn badge text-bg-primary">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ route('downloadPDF', ['id' => $row->id]) }}" class="btn badge text-bg-danger">
                                <i class="fa-regular fa-file-pdf"></i>
                            </a>
                            {{-- <button type="button" class="btn badge text-bg-danger"
                                onclick="deleteReserve('{{ $row->id }}')">
                                <i class="fa-regular fa-trash-can"></i>
                            </button> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- dataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.4.1/js/dataTables.rowReorder.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#reserveTable").DataTable({
                responsive: true,
            });
        });

        function Confirm(id) {
            document.getElementById("bk_node" + id).hidden = true;
        }

        function NoConfirm(id) {
            document.getElementById("bk_node" + id).hidden = false;
        }

        // function deleteReserve(id) {
        //     Swal.fire({
        //         title: "คุณแน่ใจไหม?",
        //         text: "คุณจะไม่สามารถย้อนกลับสิ่งนี้ได้!",
        //         icon: "warning",
        //         showCancelButton: true,
        //         confirmButtonColor: "#3085d6",
        //         cancelButtonColor: "#d33",
        //         confirmButtonText: "แน่ใจ!",
        //         cancelButtonText: "ยกเลิก"
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             $.ajax({
        //                 headers: {
        //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //                 },
        //                 url: '/deletereserve/' + id,
        //                 method: 'POST',
        //                 data: {
        //                     id: id
        //                 },
        //                 success: function(response) {
        //                     Swal.fire({
        //                         title: "ลบแล้ว!",
        //                         text: "ไฟล์ของคุณถูกลบแล้ว.",
        //                         icon: "success"
        //                     }).then(() => {
        //                         // Reload the page after successful deletion
        //                         location.reload();
        //                     });
        //                 },
        //                 error: function(xhr, status, error) {
        //                     Swal.fire({
        //                         title: "ลบไม่สำเร็จ!",
        //                         text: "ไฟล์ของคุณยังไม่ถูกลบ.",
        //                         icon: "error"
        //                     });
        //                     console.log("AJAX Request Error:", status, error);
        //                 }
        //             });

        //         }
        //     });
        // }
    </script>
@endsection
