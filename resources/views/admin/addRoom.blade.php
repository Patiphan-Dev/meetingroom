<form action="{{ route('addRoom') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12 mb-3">
            <label for="room_name" class="form-label">ชื่อหอประชุม <span>*</span></label>
            <input type="text" class="form-control" id="room_name" name="room_name" placeholder="หอประชุม" required>
        </div>
        <div class="col-12 col-md-4 mb-3">
            <label for="maintenance" class="form-label">ค่าบำรุงสถานที่ <span>*</span></label>
            <input type="number" class="form-control" id="maintenance" name="maintenance" placeholder="999" required>
        </div>
        <div class="col-12 col-md-4 mb-3">
            <label for="utilities" class="form-label">ค่าสารณูปโภค <span>*</span></label>
            <input type="number" class="form-control" id="utilities" name="utilities" placeholder="999" required>
        </div>
        <div class="col-12 col-md-4 mb-3">
            <label for="officer_compensation" class="form-label">ค่าตอบแทนเจ้าหน้าที่ <span>*</span></label>
            <input type="number" class="form-control" id="officer_compensation" name="officer_compensation"
                placeholder="999" required>
        </div>
        <div class="col-12 col-md-4 mb-3">
            <label for="other_expenses" class="form-label">ค่าใช้จ่ายอื่นๆ</label>
            <input type="number" value="0" class="form-control" id="other_expenses" name="other_expenses" placeholder="999">
        </div>
        <div class="col-12 col-md-4 mb-3">
            <label for="total" class="form-label">ค่าใช้จ่ายรวม <span>*</span></label>
            <input type="number" class="form-control" id="total" name="total" placeholder="999" required>
        </div>
        <div class="col-12 col-md-4 mb-3">
            <label for="damage_insurance" class="form-label">ค่าประกันความเสียหาย <span>*</span></label>
            <input type="number" class="form-control" id="damage_insurance" name="damage_insurance" placeholder="999"
                required>
        </div>
        <div class="col-12 mb-3">
            <label for="room_details" class="form-label">รายละเอียด</label>
            <textarea id="room_details" name="room_details" required></textarea>
        </div>
        <div class="col-12 col-md-6 mb-3">
            <label class="form-label">รูปภาพหอประชุม <span>*</span></label>
            <input type="file" class="form-control mb-3" id="imageRoom" name="room_img_path[]"
                accept="image/gif, image/jpeg, image/png" multiple required>
            <div class="row mb-3">
                <div id="imageRoomPreview"></div>
            </div>
        </div>
        <div class="col-12 col-md-6 mb-3">
            <label class="form-label">แผนภาพหอประชุม <span>*</span></label>
            <input type="file" class="form-control mb-3" id="imageDiagram" name="room_diagram_path[]"
                accept="image/gif, image/jpeg, image/png" multiple required>
            <div class="row mb-3">
                <div id="imageDiagramPreview"></div>
            </div>
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
        max-width: 12vw;
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
<script>
    document.getElementById('imageDiagram').addEventListener('change', handleFileDiagram);

    function handleFileDiagram(event) {
        const files = event.target.files;
        const previewContainer = document.getElementById('imageDiagramPreview');

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
