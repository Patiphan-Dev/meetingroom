@extends('admin.layout')

@section('body')
    <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4">
        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addRoom">
            <i class="fa-solid fa-plus"></i> เพิ่มสนาม
        </button>
        <div class="modal fade" id="addRoom" aria-hidden="true" aria-labelledby="addRoomLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered  modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addRoomLabel">เพิ่มสนามกีฬา</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('admin.addRoom')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-3">
        @foreach ($rooms as $room)
            @php
                $image = explode(',', $room->room_img_path);
            @endphp

            <div class="col-6 col-sm-4 col-md-3 text-center">
                <div class="card text-center h-100 viewroom" data-id="{{ $room->room_name }}" data-bs-toggle="modal"
                    data-bs-target="#roomDetail{{ $room->id }}">
                    <img src="{{ asset($image[0]) }}" class="img-fluid" alt="...">

                    <h3>{{ $room->room_name }}</h3>
                </div>
            </div>

            <div class="modal fade" id="roomDetail{{ $room->id }}" tabindex="-1"
                aria-labelledby="roomDetailLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div id="roomName"></div>
                            <h1 class="modal-title fs-5">{{ $room->room_name }} </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-left">
                            @include('admin.detailsRoom')
                        </div>
                        <div class="clearfix">
                            <div class="modal-footer">
                                <button class="btn btn-danger"
                                    onclick="deleteroom('{{ $room->id }}')">ลบสนาม</button>
                                <button class="btn btn-warning editModal" data-id="{{ $room->id }}"
                                    data-bs-target="#editModal{{ $room->id }}"
                                    data-bs-toggle="modal">แก้ไขข้อมูล</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="modal fade" id="editModal{{ $room->id }}" aria-hidden="true"
                aria-labelledby="editModalLabel{{ $room->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editModalLabel">แก้ไขสนามกีฬา</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @include('admin.editRoom')
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <style>
        .viewroom {
            cursor: pointer;
        }
    </style>
    <script>
        $(document).ready(function() {

            let maxSize = 500000; //5MB

            $('.viewroom').on('click', function(e) {
                e.preventDefault();
                const id = $(this).data('id');
                const currentUrl = window.location.href;
                const newUrl = '?=' + id;
                window.history.pushState({
                    path: newUrl
                }, '', newUrl);
            });

            $('.editModal').on('click', function() {
                const id = $(this).data('id');
                $('#edit_room_details' + id).summernote({
                    tabsize: 2,
                    height: 150
                });
                $('#edit_room_facilities' + id).summernote({
                    tabsize: 2,
                    height: 150
                });

                $("#files" + id).on("change", function(e) {
                    let files = e.target.files,
                        filesLength = files.length;
                    for (let i = 0; i < filesLength; i++) {
                        let f = files[i];
                        if (f.size > maxSize) {
                            $("#max_size" + id).append("<span class='link-danger'>ขนาดไฟล์: " +
                                f.size +
                                " KB. ใหญ่เกินไป (กำหนดไม่เกิน 5MB.)<span>");
                            $("#room_img_path" + id).val("");
                        }

                    }

                });

                let imagesPreview = function(input, placeToInsertImagePreview) {
                    if (input.files) {
                        var filesAmount = input.files.length;

                        for (i = 0; i < filesAmount; i++) {
                            var reader = new FileReader();

                            reader.onload = function(event) {
                                $($.parseHTML('<img class="col-6 col-md-4">')).attr('src',
                                        event
                                        .target
                                        .result)
                                    .appendTo(
                                        placeToInsertImagePreview);
                            }

                            reader.readAsDataURL(input.files[i]);
                        }
                    }
                };

                $('#files' + id).on('change', function() {
                    imagesPreview(this, '#gallery' + id);
                });
            });

            $('#room_details').summernote({
                tabsize: 2,
                height: 150
            });
            $('#room_facilities').summernote({
                tabsize: 2,
                height: 150
            });
        });

        function deleteroom(id) {
            Swal.fire({
                title: "คุณแน่ใจไหม?",
                text: "คุณจะไม่สามารถย้อนกลับสิ่งนี้ได้!",
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
                        url: '/deleteroom/' + id,
                        method: 'POST',
                        data: {
                            id: id
                        },
                        success: function(response) {
                            Swal.fire({
                                title: "ลบแล้ว!",
                                text: "สนามของคุณถูกลบแล้ว.",
                                icon: "success"
                            }).then(() => {
                                // Reload the page after successful deletion
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: "ลบไม่สำเร็จ!",
                                text: "สนามของคุณยังไม่ถูกลบ.",
                                icon: "error"
                            });
                            // console.log("AJAX Request Error:", status, error);
                        }
                    });

                }
            });
        }
    </script>
@endsection
