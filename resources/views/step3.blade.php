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

    #step3 .form-check-input:checked[type=radio] {
        --bs-form-check-bg-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='m6 10 3 3 6-6'/%3e%3c/svg%3e");
        color: #000
    }

    #step3 .form-check-input[type=radio] {
        border-radius: 0.25em;
    }

    #step3 .form-check-input {
        background-color: #ffffff;
        border-color: #000000;
        margin-right: 5px;
    }

    #step3 .form-check-input:checked {
        background-color: #000000;
        border-color: #000000;
    }

    #step3 .form-control {
        background-color: #ffffff;
        border-color: #000000;
    }

    #step3 table .form-control {
        background-color: #ffffff;
        border-color: #000000;
        border: none;
    }

    #step3 tr td {
        padding: 0px !important;
    }
</style>

<style>
    .card form span {
        color: red;
        font-size: 20px
    }
</style>
<div class="row" id="step3">
    <div class="card-body">
        <form action="{{ route('formBooking', ['id' => $_GET['booking_id']]) }}" enctype="multipart/form-data">
            @csrf
            @php
                $str_date = date('Y-m-d');
                $end_date = date('Y-m-d', strtotime('+1 day'));

                $str_time = date('H:i');
                $end_time = date('H:i');
                // $end_time = date('H:i:s', strtotime('+6 hour'));

                $image = explode(',', $room->room_img_path);
                $diagram = explode(',', $room->room_diagram_path);

            @endphp
            @foreach ($history as $row)
                @if ($row->id == $_GET['booking_id'])
                    <div class="row">
                        <input type="text" class="form-control" name="room_id" id="room_id"
                            value="{{ $room->id }}" hidden required>
                        <div class="col-12 col-sm-6 col-md-3 mb-3">
                            <label for="bk_str_date" class="form-label">วันที่จัดงาน <span>*</span></label>
                            <input type="date" class="form-control shadow-sm" name="bk_str_date"
                                min="{{ $str_date }}" id="bk_str_date"
                                @if ($row->bk_str_date != null) value="{{ $row->bk_str_date }}" @else value="{{ $str_date }}" @endif
                                required>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 mb-3">
                            <label for="bk_end_date" class="form-label">วันที่เสร็จงาน <span>*</span></label>
                            <input type="date" class="form-control shadow-sm" name="bk_end_date"
                                min="{{ $str_date }}" id="bk_end_date"
                                @if ($row->bk_end_date != null) value="{{ $row->bk_end_date }}" @else value="{{ $end_date }}" @endif
                                required>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 mb-3">
                            <label for="bk_str_time" class="form-label">เวลาเข้า <span>*</span></label>
                            <input type="time" class="form-control shadow-sm" name="bk_str_time" id="bk_str_time"
                                @if ($row->bk_str_time != null) value="{{ $row->bk_str_time }}" @else value="{{ $str_time }}" @endif
                                required onchange="Calculate()">
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 mb-3">
                            <label for="bk_end_time" class="form-label">เวลาออก <span>*</span></label>
                            <input type="time" class="form-control shadow-sm" name="bk_end_time" id="bk_end_time"
                                @if ($row->bk_end_time != null) value="{{ $row->bk_end_time }}" @else value="{{ $end_time }}" @endif
                                required onchange="Calculate()">
                        </div>
                        <div class="col-12 col-sm-9 col-md-9 mb-3">
                            <label for="bk_location_for" class="form-label">ความประสงค์ขอใช้สถานที่
                                <span>*</span></label>
                            <input type="text" class="form-control shadow-sm" name="bk_location_for"
                                @if ($row->bk_location_for != null) value="{{ $row->bk_location_for }}" @endif
                                id="bk_location_for" required>
                        </div>
                        <div class="col-12 col-sm-3 col-md-3 mb-3">
                            <label for="bk_people_number" class="form-label">ผู้มาร่วมงาน (โดยประมาณ)
                                <span>*</span></label>
                            <input type="number" class="form-control shadow-sm" name="bk_people_number"
                                @if ($row->bk_people_number != null) value="{{ $row->bk_people_number }}" @endif
                                id="bk_people_number" required>
                        </div>
                        <div class="col-12 mb-3">
                            <h6><b> วงดนตรีที่ผู้จัดงานเตรียมมานั้นเป็นแบบใด</b></h6>
                            <div>
                                <p class="mx-5">
                                    - แบบที่ 1 : วงดนตรีครบชุดมีเพาเวอร์แอมป์ ตู้ลำโพงมาเอง
                                    <small style="margin-right: 13.5rem"></small>
                                    <input class="form-check-input" type="radio" name="bk_music_brand" value="1"
                                        id="bk_music_brand1" required @if ($row->bk_music_brand == 1) checked @endif>
                                    <label class="form-check-label" for="bk_music_brand1">
                                        ใช้
                                    </label>
                                    <input class="form-check-input" type="radio" name="bk_music_brand" value="2"
                                        id="bk_music_brand2" required @if ($row->bk_music_brand == 2) checked @endif>
                                    <label class="form-check-label" for="bk_music_brand2">
                                        ไม่ใช้
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p class="mx-5">
                                    - แบบที่ 2 : มีเฉพาะเครื่องดนตรี เช่น กีต้าร์ กลอง ไม่มีเพาเวอร์แอมป์ ตู้ลำโพง
                                    <small style="margin-right: 6rem"></small>
                                    <input class="form-check-input" type="radio" name="bk_music_equipment"
                                        value="1" id="bk_music_equipment1" required
                                        @if ($row->bk_music_equipment == 1) checked @endif>
                                    <label class="form-check-label" for="bk_music_equipment1">
                                        ใช้
                                    </label>
                                    <input class="form-check-input" type="radio" name="bk_music_equipment"
                                        value="2" id="bk_music_equipment2" required
                                        @if ($row->bk_music_equipment == 2) checked @endif>
                                    <label class="form-check-label" for="bk_music_equipment2">
                                        ไม่ใช้
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p class="mx-5">
                                    - กรณีเป็นแบบที่ 2 ต้องการต่อเครื่องดนตรีเข้ากับระบบเสียงของหอประชุมหรือไม่
                                    <small style="margin-right: 5rem"></small>
                                    <input class="form-check-input" type="radio" name="bk_music_details"
                                        value="1" id="bk_music_details1"
                                        @if ($row->bk_music_details == 1) checked @endif>
                                    <label class="form-check-label" for="bk_music_details1">
                                        ใช้
                                    </label>
                                    <input class="form-check-input" type="radio" name="bk_music_details"
                                        value="2" id="bk_music_details2"
                                        @if ($row->bk_music_details == 2) checked @endif>
                                    <label class="form-check-label" for="bk_music_details2">
                                        ไม่ใช้
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <table class="table table-bordered border-dark mt-3">
                                <thead class="text-center">
                                    <tr>
                                        <th>ที่</th>
                                        <th>รายการ</th>
                                        <th>ต้องการ</th>
                                        <th>ไม่ต้องการ</th>
                                        <th>หมายเหตุ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>ระบบเสียงพร้อมไมค์โครโฟน 2 ตัว</td>
                                        <td class="text-center">
                                            <input class="form-check-input" type="radio" name="bk_sound"
                                                value="1" id="bk_sound1" required @if ($row->bk_sound == 1) checked @endif>
                                            <label class="form-check-label" for="bk_sound1">
                                                ใช้
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <input class="form-check-input" type="radio" name="bk_sound"
                                                value="2" id="bk_sound2" required @if ($row->bk_sound == 2) checked @endif>
                                            <label class="form-check-label" for="bk_sound2">
                                                ไม่ใช้
                                            </label>
                                        </td>
                                        <td><input class="form-control" type="text" name="bk_sound_node"
                                                id="bk_sound_note" @if ($row->bk_sound_node != null) value="{{ $row->bk_sound_node }}" @endif></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td>จอภาพขนาดใหญ่บนเวที่ 1 จอ</td>
                                        <td class="text-center">
                                            <input class="form-check-input" type="radio" name="bk_screen_big"
                                                value="1" id="bk_screen_big1" required @if ($row->bk_screen_big == 1) checked @endif>
                                            <label class="form-check-label" for="bk_screen_big1">
                                                ใช้
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <input class="form-check-input" type="radio" name="bk_screen_big"
                                                value="2" id="bk_screen_big2" required @if ($row->bk_screen_big == 2) checked @endif>
                                            <label class="form-check-label" for="bk_screen_big2">
                                                ไม่ใช้
                                            </label>
                                        </td>
                                        <td><input class="form-control" type="text" name="bk_screen_big_note"
                                                id="bk_screen_big_note" @if ($row->bk_screen_big_note != null) value="{{ $row->bk_screen_big_note }}" @endif></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td>จอภาพทีวีด้านข้างฝั่งซ้าย 4 จอ</td>
                                        <td class="text-center">
                                            <input class="form-check-input" type="radio" name="bk_tv_left"
                                                value="1" id="bk_tv_left1" required @if ($row->bk_tv_left == 1) checked @endif>
                                            <label class="form-check-label" for="bk_tv_left2">
                                                ใช้
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <input class="form-check-input" type="radio" name="bk_tv_left"
                                                value="2" id="bk_tv_left1" required @if ($row->bk_tv_left == 2) checked @endif>
                                            <label class="form-check-label" for="bk_tv_left2">
                                                ไม่ใช้
                                            </label>
                                        </td>
                                        <td><input class="form-control" type="text" name="bk_tv_left_note"
                                                id="bk_tv_left_note" @if ($row->bk_tv_left_note != null) value="{{ $row->bk_tv_left_note }}" @endif>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td>จอภาพทีวีด้านข้างฝั่งขวา 4 จอ</td>
                                        <td class="text-center">
                                            <input class="form-check-input" type="radio" name="bk_tv_right"
                                                value="1" id="bk_tv_right1" required @if ($row->bk_tv_right == 1) checked @endif>
                                            <label class="form-check-label" for="bk_tv_right1">
                                                ใช้
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <input class="form-check-input" type="radio" name="bk_tv_right"
                                                value="2" id="bk_tv_right2" required @if ($row->bk_tv_right == 2) checked @endif>
                                            <label class="form-check-label" for="bk_tv_right2">
                                                ไม่ใช้
                                            </label>
                                        </td>
                                        <td><input class="form-control" type="text" name="bk_tv_right_note"
                                                id="bk_tv_right_note" @if ($row->bk_tv_right_note != null) value="{{ $row->bk_tv_right_note }}" @endif>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td>โต๊ะปฏิบัติการหน้าขาว 10 ตัว</td>
                                        <td class="text-center">
                                            <input class="form-check-input" type="radio" name="bk_table"
                                                value="1" id="bk_table1" required @if ($row->bk_music_details == 1) checked @endif>
                                            <label class="form-check-label" for="bk_table1">
                                                ใช้
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <input class="form-check-input" type="radio" name="bk_table"
                                                value="2" id="bk_table2" required @if ($row->bk_music_details == 2) checked @endif>
                                            <label class="form-check-label" for="bk_table2">
                                                ไม่ใช้
                                            </label>
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" name="bk_table_note"
                                                id="bk_table_note" @if ($row->bk_table_note != null) value="{{ $row->bk_table_note }}" @endif>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            @endforeach
            <div class="d-flex justify-content-center my-4">
                <a href="javascript:history.back()" class="d-inline mx-2 btn btn-secondary">ย้อนกลับ</a>
                <input type="submit" class="d-inline mx-2 btn btn-primary" id="submit" value="ถัดไป">
            </div>
        </form>
    </div>
</div>
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
