<style>
    #step2 .form-check-input:checked[type=radio] {
        --bs-form-check-bg-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='m6 10 3 3 6-6'/%3e%3c/svg%3e");
        color: #000
    }

    #step2 .form-check-input[type=radio] {
        border-radius: 0.25em;
    }

    #step2 .form-check-input {
        background-color: #ffffff;
        border-color: #000000;
        margin-right: 5px;
    }

    #step2 .form-check-input:checked {
        background-color: #000000;
        border-color: #000000;
    }
</style>
<div class="row" id="step2">
    <div class="row">
        <div><b>สิ่งที่ผู้จัดงานต้องเตรียมให้ฝ่ายโสตทัศนูปกรณ์</b></div>
        <div>- ไฟล์ภาพหรือวิดีโอขนาด 1920x1080 (นามสกุล .jpg หรือ .mp4)</div>
        <div>- ไฟล์วิดีโอพรีเจนเทชั่นสำหรับเปิดออกจอภาพ (กรณีที่มี)</div>
        <div>- ไฟล์เพลงสำหรับเปิดในงาน</div>
        <div>- ผู้ประสานงานในการบอกคิวการเปิดวิดีโอพรีเซนเทชั่นและเพลงประกอบ</div>
        <div>- กำหนดการของงาน</div>
    </div>
    <br>
    <div class="row">
        <div><b> วงดนตรีที่ผู้จัดงานเตรียมมานั้นเป็นแบบใด</b></div>
        <div>- แบบที่ 1 : วงดนตรีครบชุดมีเพาเวอร์แอมป์ ตู้ลำโพงมาเอง
            <span class="mx-5">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    ใช้
                </label>
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">
                    ไม่ใช้
                </label>
            </span>
        </div>
        <div>- แบบที่ 2 : มีเฉพาะเครื่องดนตรี เช่น กีต้าร์ กลอง ไม่มีเพาเวอร์แอมป์ ตู้ลำโพง
            <span class="mx-5">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                <label class="form-check-label" for="flexRadioDefault3">
                    ใช้
                </label>
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
                <label class="form-check-label" for="flexRadioDefault4">
                    ไม่ใช้
                </label>
            </span>
        </div>
        <div> - กรณีเป็นแบบที่ 2 ต้องการต่อเครื่องดนตรีเข้ากับระบบเสียงของหอประชุมหรือไม่
            <span class="mx-5">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault5">
                <label class="form-check-label" for="flexRadioDefault5">
                    ใช้
                </label>
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault6">
                <label class="form-check-label" for="flexRadioDefault6">
                    ไม่ใช้
                </label>
            </span>
        </div>
    </div>
    <br>
    <div class="row">
        <b class="text-center">รายการขอใช้วัสดุ อุปกรณ์
            (ด้านโสตทัศนูปกรณ์)ในการขอใช้หอประชุม{{ $room->room_name }}<br>
            ของ...............................................................................................
            ในวันที่
            ....................................................................</b>

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
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" checked>
                        <label class="form-check-label" for="flexRadioDefault3">
                            ใช้
                        </label>
                    </td>
                    <td class="text-center">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
                        <label class="form-check-label" for="flexRadioDefault4">
                            ไม่ใช้
                        </label>
                    </td>
                    <td><input class="form-control" type="text" name="flexRadioDefault" id="flexRadioDefault3"></td>
                </tr>
                <tr>
                    <td class="text-center">2</td>
                    <td>จอภาพขนาดใหญ่บนเวที่ 1 จอ</td>
                    <td class="text-center">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" checked>
                        <label class="form-check-label" for="flexRadioDefault3">
                            ใช้
                        </label>
                    </td>
                    <td class="text-center">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
                        <label class="form-check-label" for="flexRadioDefault4">
                            ไม่ใช้
                        </label>
                    </td>
                    <td><input class="form-control" type="text" name="flexRadioDefault" id="flexRadioDefault3"></td>
                </tr>
                <tr>
                    <td class="text-center">3</td>
                    <td>จอภาพทีวีด้านข้างฝั่งซ้าย 4 จอ</td>
                    <td class="text-center">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" checked>
                        <label class="form-check-label" for="flexRadioDefault3">
                            ใช้
                        </label>
                    </td>
                    <td class="text-center">
                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                            id="flexRadioDefault4" checked>
                        <label class="form-check-label" for="flexRadioDefault4">
                            ไม่ใช้
                        </label>
                    </td>
                    <td><input class="form-control" type="text" name="flexRadioDefault" id="flexRadioDefault3">
                    </td>
                </tr>
                <tr>
                    <td class="text-center">3</td>
                    <td>จอภาพทีวีด้านข้างฝั่งขวา 4 จอ</td>
                    <td class="text-center">
                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                            id="flexRadioDefault3" checked>
                        <label class="form-check-label" for="flexRadioDefault3">
                            ใช้
                        </label>
                    </td>
                    <td class="text-center">
                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                            id="flexRadioDefault4">
                        <label class="form-check-label" for="flexRadioDefault4">
                            ไม่ใช้
                        </label>
                    </td>
                    <td><input class="form-control" type="text" name="flexRadioDefault" id="flexRadioDefault3">
                    </td>
                </tr>
                <tr>
                    <td class="text-center">4</td>
                    <td>โต๊ะปฏิบัติการหน้าขาว 10 ตัว</td>
                    <td class="text-center">
                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                            id="flexRadioDefault3" checked>
                        <label class="form-check-label" for="flexRadioDefault3">
                            ใช้
                        </label>
                    </td>
                    <td class="text-center">
                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                            id="flexRadioDefault4">
                        <label class="form-check-label" for="flexRadioDefault4">
                            ไม่ใช้
                        </label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="flexRadioDefault" id="flexRadioDefault3">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
