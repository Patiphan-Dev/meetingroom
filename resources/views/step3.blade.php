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
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('formBookingRoom', ['id' => $_GET['booking_id']]) }}" enctype="multipart/form-data">
                @csrf
                @php
                    $str_date = date('Y-m-d');
                    $end_date = date('Y-m-d', strtotime('+1 day'));

                    $str_time = date('H:i:s');
                    $end_time = date('H:i:s');
                    // $end_time = date('H:i:s', strtotime('+6 hour'));

                    $image = explode(',', $room->room_img_path);
                    $diagram = explode(',', $room->room_diagram_path);

                @endphp
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3 mb-3">
                        <label for="bk_str_date" class="form-label">วันที่จัดงาน <span>*</span></label>
                        <input type="date" class="form-control shadow-sm" name="bk_str_date"
                            min="{{ $str_date }}" id="bk_str_date" value="{{ $str_date }}" required>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 mb-3">
                        <label for="bk_end_date" class="form-label">วันที่เสร็จงาน <span>*</span></label>
                        <input type="date" class="form-control shadow-sm" name="bk_end_date"
                            min="{{ $str_date }}" id="bk_end_date" value="{{ $end_date }}" required>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 mb-3">
                        <label for="bk_str_time" class="form-label">เวลาเข้า <span>*</span></label>
                        <input type="time" class="form-control shadow-sm" name="bk_str_time" id="bk_str_time"
                            value="{{ $str_time }}" required onchange="Calculate()">
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 mb-3">
                        <label for="bk_end_time" class="form-label">เวลาออก <span>*</span></label>
                        <input type="time" class="form-control shadow-sm" name="bk_end_time" id="bk_end_time"
                            value="{{ $end_time }}" required onchange="Calculate()">
                    </div>
                    <div class="col-12 col-sm-9 col-md-9 mb-3">
                        <label for="bk_location_for" class="form-label">ความประสงค์ขอใช้สถานที่ <span>*</span></label>
                        <input type="text" class="form-control shadow-sm" name="bk_location_for" id="bk_location_for"
                            required>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3 mb-3">
                        <label for="bk_people_number" class="form-label">ผู้มาร่วมงาน (โดยประมาณ) <span>*</span></label>
                        <input type="number" class="form-control shadow-sm" name="bk_people_number"
                            id="bk_people_number" required>
                    </div>
                    {{-- <div class="col-12 col-md-6 mb-3">
                        <label for="room_name" class="form-label">ชื่อหอประชุม <span>*</span></label>
                        <input type="text" class="form-control shadow-sm" id="room_name" name="room_name"
                            placeholder="หอประชุม" value="{{ $room->room_name }}" required>
                    </div>
                    <div class="col-12 col-md-3 mb-3">
                        <label for="maintenance" class="form-label">ค่าบำรุงสถานที่ <span>*</span></label>
                        <input type="number" class="form-control shadow-sm" id="maintenance" name="maintenance"
                            placeholder="999" value="{{ $room->maintenance }}" required>
                    </div>
                    <div class="col-12 col-md-3 mb-3">
                        <label for="utilities" class="form-label">ค่าสารณูปโภค <span>*</span></label>
                        <input type="number" class="form-control shadow-sm" id="utilities" name="utilities"
                            placeholder="999" value="{{ $room->utilities }}" required>
                    </div>
                    <div class="col-12 col-md-3 mb-3">
                        <label for="officer_compensation" class="form-label">ค่าตอบแทนเจ้าหน้าที่ <span>*</span></label>
                        <input type="number" class="form-control shadow-sm" id="officer_compensation"
                            name="officer_compensation" placeholder="999" value="{{ $room->officer_compensation }}"
                            required>
                    </div>
                    <div class="col-12 col-md-3 mb-3">
                        <label for="other_expenses" class="form-label">ค่าใช้จ่ายอื่นๆ</label>
                        <input type="number" class="form-control shadow-sm" id="other_expenses" name="other_expenses"
                            placeholder="999" value="{{ $room->other_expenses }}" required>
                    </div>
                    <div class="col-12 col-md-3 mb-3">
                        <label for="total" class="form-label">ค่าใช้จ่ายรวม <span>*</span></label>
                        <input type="number" class="form-control shadow-sm" id="total" name="total"
                            placeholder="999" value="{{ $room->total }}" required>
                    </div>
                    <div class="col-12 col-md-3 mb-4">
                        <label for="damage_insurance" class="form-label">ค่าประกันความเสียหาย <span>*</span></label>
                        <input type="number" class="form-control shadow-sm" id="damage_insurance"
                            name="damage_insurance" placeholder="999" value="{{ $room->damage_insurance }}"
                            required>
                    </div> --}}
                    <div class="col-12">
                        <h6><b> วงดนตรีที่ผู้จัดงานเตรียมมานั้นเป็นแบบใด</b></h6>
                        <div>
                            <p class="mx-5">
                                - แบบที่ 1 : วงดนตรีครบชุดมีเพาเวอร์แอมป์ ตู้ลำโพงมาเอง <small
                                    style="margin-right: 13.5rem"></small>
                                <input class="form-check-input" type="radio" name="bk_music_brand"
                                    id="bk_music_brand1">
                                <label class="form-check-label" for="bk_music_brand1">
                                    ใช้
                                </label>
                                <input class="form-check-input" type="radio" name="bk_music_brand"
                                    id="bk_music_brand2">
                                <label class="form-check-label" for="bk_music_brand2">
                                    ไม่ใช้
                                </label>
                            </p>
                        </div>
                        <div>
                            <p class="mx-5">
                                - แบบที่ 2 : มีเฉพาะเครื่องดนตรี เช่น กีต้าร์ กลอง ไม่มีเพาเวอร์แอมป์ ตู้ลำโพง <small
                                    style="margin-right: 6rem"></small>
                                <input class="form-check-input" type="radio" name="bk_music_equipment"
                                    id="bk_music_equipment1">
                                <label class="form-check-label" for="bk_music_equipment1">
                                    ใช้
                                </label>
                                <input class="form-check-input" type="radio" name="bk_music_equipment"
                                    id="bk_music_equipment2">
                                <label class="form-check-label" for="bk_music_equipment2">
                                    ไม่ใช้
                                </label>
                            </p>
                        </div>
                        <div>
                            <p class="mx-5">
                                - กรณีเป็นแบบที่ 2 ต้องการต่อเครื่องดนตรีเข้ากับระบบเสียงของหอประชุมหรือไม่ <small
                                    style="margin-right: 5rem"></small>
                                <input class="form-check-input" type="radio" name="bk_music_details"
                                    id="bk_music_details1">
                                <label class="form-check-label" for="bk_music_details1">
                                    ใช้
                                </label>
                                <input class="form-check-input" type="radio" name="bk_music_details"
                                    id="bk_music_details2">
                                <label class="form-check-label" for="bk_music_details2">
                                    ไม่ใช้
                                </label>
                            </p>
                        </div>
                    </div>
                    <div class="col-12">
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
                                            id="bk_sound1">
                                        <label class="form-check-label" for="bk_sound1">
                                            ใช้
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="bk_sound"
                                            id="bk_sound2">
                                        <label class="form-check-label" for="bk_sound2">
                                            ไม่ใช้
                                        </label>
                                    </td>
                                    <td><input class="form-control" type="text" name="bk_sound_node"
                                            id="bk_sound_note"></td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td>จอภาพขนาดใหญ่บนเวที่ 1 จอ</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="bk_screen_big"
                                            id="bk_screen_big1">
                                        <label class="form-check-label" for="bk_screen_big1">
                                            ใช้
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="bk_screen_big"
                                            id="bk_screen_big2">
                                        <label class="form-check-label" for="bk_screen_big2">
                                            ไม่ใช้
                                        </label>
                                    </td>
                                    <td><input class="form-control" type="text" name="bk_screen_big_note"
                                            id="bk_screen_big_note"></td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td>จอภาพทีวีด้านข้างฝั่งซ้าย 4 จอ</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="bk_tv_left"
                                            id="bk_tv_left1">
                                        <label class="form-check-label" for="bk_tv_left2">
                                            ใช้
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="bk_tv_left"
                                            id="bk_tv_left1">
                                        <label class="form-check-label" for="bk_tv_left2">
                                            ไม่ใช้
                                        </label>
                                    </td>
                                    <td><input class="form-control" type="text" name="bk_tv_left_note"
                                            id="bk_tv_left_note">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td>จอภาพทีวีด้านข้างฝั่งขวา 4 จอ</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="bk_tv_right"
                                            id="bk_tv_right1">
                                        <label class="form-check-label" for="bk_tv_right1">
                                            ใช้
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="bk_tv_right"
                                            id="bk_tv_right2">
                                        <label class="form-check-label" for="bk_tv_right2">
                                            ไม่ใช้
                                        </label>
                                    </td>
                                    <td><input class="form-control" type="text" name="bk_tv_right_note"
                                            id="bk_tv_right_note">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td>โต๊ะปฏิบัติการหน้าขาว 10 ตัว</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="bk_table"
                                            id="bk_table1">
                                        <label class="form-check-label" for="bk_table1">
                                            ใช้
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="bk_table"
                                            id="bk_table2">
                                        <label class="form-check-label" for="bk_table2">
                                            ไม่ใช้
                                        </label>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="bk_table_note"
                                            id="bk_table_note">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-center my-4">
                    <a href="javascript:history.back()" class="d-inline mx-2 btn btn-secondary">ย้อนกลับ</a>
                    <input type="submit" class="d-inline mx-2 btn btn-primary" id="submit" value="ถัดไป">
                </div>
            </form>
        </div>
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
