<script>
    function Calculate() {
        // Get the input values
        const bookInTime = document.getElementById("bk_str_time").value;
        const bookOutTime = document.getElementById("bk_end_time").value;
        // Get the selected option
        var selectedOption = $('#bk_room_id option:selected');
        // Retrieve the data-price attribute value
        var price = parseFloat(selectedOption.data('price'));
        // Convert the input values to Date objects
        const bookInDate = new Date(`2000-01-01T${bookInTime}:00Z`);
        const bookOutDate = new Date(`2000-01-01T${bookOutTime}:00Z`);

        // Calculate the time difference in minutes
        const timeDifference = (bookOutDate - bookInDate) / (1000 * 60);

        // Calculate the Total Price 
        const totalPrice = (price / 60) * timeDifference

        const roundedNumber = Math.round(totalPrice);

        // Display
        document.getElementById("bk_price").value = `${price}`;
        document.getElementById("bk_sumtime").value = `${timeDifference}`;
        document.getElementById("bk_total_price").value = `${roundedNumber}`;
    }
</script>
<style>
    #imagePreview,
    #imageDiagram {
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


<form action="{{ route('addBooking') }}" method="post" enctype="multipart/form-data">
    @csrf
    @php
        $str_date = date('Y-m-d');
        $end_date = date('Y-m-d', strtotime('+6 day'));

        $str_time = date('H:i:s');
        $end_time = date('H:i:s', strtotime('+5 hour'));

        $image = explode(',', $room->room_img_path);
        $diagram = explode(',', $room->room_diagram_path);

    @endphp
    <div class="row">
        <div class="col-12 col-sm-6 col-md-6 mb-3">
            <label for="bk_str_date" class="form-label">วันที่จอง : </label>
            <input type="date" class="form-control" name="bk_str_date" id="bk_str_date" value="{{ $str_date }}"
                required>
        </div>
        <div class="col-12 col-sm-6 col-md-6 mb-3">
            <label for="bk_end_date" class="form-label">วันที่จอง : </label>
            <input type="date" class="form-control" name="bk_end_date" id="bk_end_date" value="{{ $end_date }}"
                required>
        </div>
        <div class="col-12 col-sm-6 col-md-6 mb-3">
            <label for="bk_str_time" class="form-label">เวลาเข้า : </label>
            <input type="time" class="form-control" name="bk_str_time" id="bk_str_time" value="{{ $str_time }}"
                required onchange="Calculate()">
        </div>
        <div class="col-12 col-sm-6 col-md-6 mb-3">
            <label for="bk_end_time" class="form-label">เวลาออก : </label>
            <input type="time" class="form-control" name="bk_end_time" id="bk_end_time" value="{{ $end_time }}"
                required onchange="Calculate()">
        </div>
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
            <input type="number" class="form-control" id="officer_compensation" name="officer_compensation"
                placeholder="999" value="{{ $room->officer_compensation }}" required>
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
            <label for="room_details" class="form-label">สิ่งที่ผู้จัดงานตั้งเตรียมให้ฝ่ายโสตทัศนูปกรณ์</label>
        </div>
        <div class="col-12 mb-3">
            <label for="room_details" class="form-label">วงดนตรีที่ผู้จัดงานเตรียมมานั้นเป็นแบบใด</label>
        </div>
        <div class="col-12 mb-3">
            <label for="room_details" class="form-label">
                รายการขอใช้วัสดุ อุปกรณ์ (ด้านโสตทัศนูปกรณ์)
                ในการขอใช้หอประชุม{{ $room->room_name }}
            </label>
        </div>
        <table class="table table-bordered border-primary">
            <thead class="text-center">
                <th>ที่</th>
                <th>รายการ</th>
                <th>ต้องการ</th>
                <th>ไม่ต้องการ</th>
                <th>หมายเหตุ</th>
            </thead>
            <tbody>
                <td class="text-end">{{ $room->maintenance }}</td>
                <td class="text-end">{{ $room->utilities }}</td>
                <td class="text-end">{{ $room->officer_compensation }}</td>
                <td class="text-end">{{ $room->other_expenses }}</td>
                <td class="text-end">{{ $room->total }}</td>
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
        <input type="submit" class="btn btn-primary" id="submit" value="บันทึก">
    </div>
</form>

