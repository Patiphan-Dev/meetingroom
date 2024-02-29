<form action="{{ url('updateroom/' . $room->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12 col-md-6 mb-3">
            <label for="room_name" class="form-label">ชื่อสนาม <span>*</span></label>
            <input type="text" class="form-control" id="room_name" name="room_name" placeholder="สนามกีฬา"
                value="{{ $room->room_name }}" required>
        </div>
        <div class="col-12 col-md-6 mb-3">
            <label for="room_price" class="form-label">ราคา <span>*</span></label>
            <input type="number" class="form-control" id="room_price" name="room_price" placeholder="999"
                value="{{ $room->room_price }}" required>

        </div>
        <div class="col-12 mb-3">
            <label for="room_details" class="form-label">รายละเอียด</label>
            <textarea id="edit_room_details{{ $room->id }}" name="room_details" required>{!! $room->room_details !!}</textarea>
        </div>
        <div class="col-12 mb-3">
            <label for="room_facilities" class="form-label">สิ่งอำนวยความสะดวก</label>
            <textarea id="edit_room_facilities{{ $room->id }}" name="room_facilities" required>{!! $room->room_facilities !!}</textarea>
        </div>
        <div class="col-12 mb-3">
            <div class="form-group">
                <label for="room_status" class="form-label">สถานะสนาม <span>*</span> </label>
                <div class="form-group clearfix">
                    <div class="btn btn-primary icheck-success">
                        <input class="d-inline" type="radio" id="room_status1" value="1" name="room_status"
                            @if ($room->room_status == 1) checked @endif required>
                        <label for="car1">
                            เปิดใช้บริการสนาม
                        </label>
                    </div>
                    <div class="btn btn-danger icheck-success">
                        <input class="d-inline" type="radio" id="room_status2" value="0" name="room_status"
                            @if ($room->room_status == 0) checked @endif required>
                        <label for="car2">
                            ปิดใช้บริการสนาม
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mb-3">
            <label class="form-label">รูปภาพสนาม <span>*</span></label>
            <input type="file" class="form-control" id="imageInput{{ $room->id }}" name="room_img_path[]"
                accept="image/gif, image/jpeg, image/png" onchange="inputFile('{{ $room->id }}')" multiple>
        </div>
        <div class="row mb-3">
            <div id="imagePreview{{ $room->id }}">
                @foreach ($image as $key => $img)
                    <img src="{{ asset($img) }}" class="previewImage" alt="...">
                @endforeach
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
        <input type="submit" class="btn btn-primary" id="submit" value="บันทึก">
    </div>
</form>
<style>
    #imagePreview {
        display: flex;
        flex-wrap: wrap;
    }

    .previewImage {
        margin: 5px;
        max-width: 15vw;
        max-height: 30vh;
        object-fit: cover;
        border: 1px solid #000009;
        border-radius: 6px;
        padding: 2px;
    }
</style>
<script>
    function inputFile(id) {
        document.getElementById('imageInput' + id);
        handleFileSelect(event, id);
    }

    function handleFileSelect(event, id) {
        const files = event.target.files;
        const previewContainer = document.getElementById('imagePreview' + id);

        // Clear the existing preview
        previewContainer.innerHTML = '';

        for (const file of files) {
            // Check if the file is an image
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const previewImage = document.createElement('img');
                    previewImage.classList.add('previewImage');
                    previewImage.src = e.target.result;
                    previewContainer.appendChild(previewImage);
                };

                // Read the image file as a data URL
                reader.readAsDataURL(file);
            }
        }
    }
</script>
