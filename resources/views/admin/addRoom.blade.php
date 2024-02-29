<form action="{{ route('addRoom') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12 col-md-6 mb-3">
            <label for="room_name" class="form-label">ชื่อสนาม <span>*</span></label>
            <input type="text" class="form-control" id="room_name" name="room_name" placeholder="สนามกีฬา" required>
        </div>
        <div class="col-12 col-md-6 mb-3">
            <label for="room_price" class="form-label">ราคา <span>*</span></label>
            <input type="number" class="form-control" id="room_price" name="room_price" placeholder="999" required>

        </div>
        <div class="col-12 mb-3">
            <label for="room_details" class="form-label">รายละเอียด</label>
            <textarea id="room_details" name="room_details" required></textarea>
        </div>
        <div class="col-12 mb-3">
            <label for="room_facilities" class="form-label">สิ่งอำนวยความสะดวก</label>
            <textarea id="room_facilities" name="room_facilities" required></textarea>
        </div>
        <div class="col-12 mb-3">
            <label class="form-label">รูปภาพสนาม <span>*</span></label>
            <input type="file" class="form-control" id="imageRoom" name="room_img_path[]"
                accept="image/gif, image/jpeg, image/png" multiple required>
        </div>
        <div class="row mb-3">
            
            <div id="imageRoomPreview"></div>
        </div>
    </div>
    <div class="modal-footer">
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
    document.getElementById('imageRoom').addEventListener('change', handleFileRoom);

    function handleFileRoom(event) {
        const files = event.target.files;
        const previewContainer = document.getElementById('imageRoomPreview');

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
