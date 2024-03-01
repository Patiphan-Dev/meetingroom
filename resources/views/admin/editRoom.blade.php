<form action="{{ url('updateroom/' . $room->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12 mb-3">
            <label for="room_name" class="form-label">ชื่อหอประชุม <span>*</span></label>
            <input type="text" class="form-control" id="room_name" name="room_name" placeholder="หอประชุม"
                value="{{ $room->room_name }}" required>
        </div>
        <div class="col-12 col-md-6 mb-3">
            <label for="maintenance" class="form-label">ค่าบำรุงสถานที่ <span>*</span></label>
            <input type="number" class="form-control" id="maintenance" name="maintenance" placeholder="999"
                value="{{ $room->maintenance }}" required>
        </div>
        <div class="col-12 col-md-6 mb-3">
            <label for="utilities" class="form-label">ค่าสารณูปโภค <span>*</span></label>
            <input type="number" class="form-control" id="utilities" name="utilities" placeholder="999"
                value="{{ $room->utilities }}" required>
        </div>
        <div class="col-12 col-md-6 mb-3">
            <label for="officer_compensation" class="form-label">ค่าตอบแทนเจ้าหน้าที่ <span>*</span></label>
            <input type="number" class="form-control" id="officer_compensation" name="officer_compensation" placeholder="999"
                value="{{ $room->officer_compensation }}" required>
        </div>
        <div class="col-12 col-md-6 mb-3">
            <label for="other_expenses" class="form-label">ค่าใช้จ่ายอื่นๆ</label>
            <input type="number" class="form-control" id="other_expenses" name="other_expenses" placeholder="999"
                value="{{ $room->other_expenses }}" required>
        </div>
        <div class="col-12 col-md-6 mb-3">
            <label for="total" class="form-label">ค่าใช้จ่ายรวม <span>*</span></label>
            <input type="number" class="form-control" id="total" name="total" placeholder="999"
                value="{{ $room->total }}" required>
        </div>
        <div class="col-12 col-md-6 mb-3">
            <label for="damage_insurance" class="form-label">ค่าประกันความเสียหาย <span>*</span></label>
            <input type="number" class="form-control" id="damage_insurance" name="damage_insurance" placeholder="999"
                value="{{ $room->damage_insurance }}" required>
        </div>
        <div class="col-12 mb-3">
            <label for="room_details" class="form-label">รายละเอียด</label>
            <textarea id="edit_room_details{{ $room->id }}" name="room_details" required>{!! $room->room_details !!}</textarea>
        </div>
        <div class="col-12 mb-3">
            <div class="form-group">
                <label for="room_status" class="form-label">สถานะหอประชุม <span>*</span> </label>
                <div class="form-group clearfix">
                    <div class="btn btn-primary icheck-success">
                        <input class="d-inline" type="radio" id="room_status1" value="1" name="room_status"
                            @if ($room->room_status == 1) checked @endif required>
                        <label for="car1">
                            เปิดใช้บริการหอประชุม
                        </label>
                    </div>
                    <div class="btn btn-danger icheck-success">
                        <input class="d-inline" type="radio" id="room_status2" value="0" name="room_status"
                            @if ($room->room_status == 0) checked @endif required>
                        <label for="car2">
                            ปิดใช้บริการหอประชุม
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 mb-3">
            <label class="form-label">รูปภาพหอประชุม <span>*</span></label>
            <input type="file" class="form-control mb-3" id="imageInput{{ $room->id }}" name="room_img_path[]"
                accept="image/gif, image/jpeg, image/png" onchange="inputFile('{{ $room->id }}')" multiple>
            <div class="row mb-3">
                <div id="imagePreview{{ $room->id }}">
                    @foreach ($image as $key => $img)
                        <img src="{{ asset($img) }}" class="previewImage" alt="...">
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 mb-3">
            <label class="form-label">แผนภาพหอประชุม <span>*</span></label>
            <input type="file" class="form-control mb-3" id="imageDiagram{{ $room->id }}" name="room_diagram_path[]"
                accept="image/gif, image/jpeg, image/png" onchange="inputDiagram('{{ $room->id }}')" multiple>
            <div class="row mb-3">
                <div id="diagramPreview{{ $room->id }}">
                    @foreach ($diagram as $key => $d)
                        <img src="{{ asset($d) }}" class="previewDiagram" alt="...">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
        <input type="submit" class="btn btn-primary" id="submit" value="บันทึก">
    </div>
</form>
<style>
    #imagePreview,
    #diagramPreview {
        display: flex;
        flex-wrap: wrap;
    }

    .previewImage,
    .previewDiagram {
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

<script>
    function inputDiagram(id) {
        document.getElementById('diagramInput' + id);
        handleFileSelect2(event, id);
    }

    function handleFileSelect2(event, id) {
        const files = event.target.files;
        const previewContainer2 = document.getElementById('diagramPreview' + id);

        // Clear the existing preview
        previewContainer2.innerHTML = '';

        for (const file of files) {
            // Check if the file is an image
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const imageDiagram = document.createElement('img');
                    imageDiagram.classList.add('previewDiagram');
                    imageDiagram.src = e.target.result;
                    previewContainer2.appendChild(imageDiagram);
                };

                // Read the image file as a data URL
                reader.readAsDataURL(file);
            }
        }
    }
</script>
