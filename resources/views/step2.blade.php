<style>
    ol {
        list-style-type: none;
        counter-reset: item;
        margin: 0;
        padding: 0;
    }

    ol>li {
        display: table;
        counter-increment: item;
        margin-bottom: 0.6em;
    }

    ol>li:before {
        content: counters(item, ".") ". ";
        display: table-cell;
        padding-right: 0.6em;
    }

    li ol>li {
        margin: 0;
    }

    li ol>li:before {
        content: counters(item, ".") " ";
    }
</style>
<style>
    #step2 .form-check-input:checked[type=radio] {
        --bs-form-check-bg-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='m6 10 3 3 6-6'/%3e%3c/svg%3e");
        color: #000
    }

    #step2 .form-check-input[type=radio] {
        border-radius: 0.25em;
    }

    #step2 .form-check-input {
        width: 1.5em;
        height: 1.5em;
        background-color: #ffffff;
        border-color: #ff0000;
        margin-right: 5px;
    }

    #step2 .form-check-input:checked {
        background-color: #000000;
        border-color: #000000;
    }
</style>
<div class="row" id="step2">
    <form action="{{ route('ConfirmBooking', ['id' => $_GET['booking_id'], 'id' => $room->id]) }}">

        <div class="col-12 my-5 px-5">
            <h5 class="text-center"><b>ข้อตกลงในการใช้อาคารสถานที่ของมหาวิทยาลัยเทคโนโลยีราชมงคลสุวรรณภูมิ</b></h5>
            <ol class="list-group list-group-numbered">
                <li class="list-item">การใช้อาคารสถานที่ของมหาวิทยาลัย
                    ผู้ได้รับอนุญาตให้ใช้อาคารสถานที่จะต้องปฏิบัติให้เป็นไปตามกฎหมาย
                    ระเบียบ ข้อบังคับ วัฒนธรรม ประเพณี และไม่ขัดต่อความสงบเรียบร้อยและศีลธรรมอันดีและหลักเกณฑ์
                    ที่มหาวิทยาลัยกำหนด หากมีการใช้อาคารสถานที่เพื่อการอย่างอื่นนอกเหนือจากที่ได้รับอนุญาต ให้อธิการบดี
                    หรือผู้ที่อธิการบดีมอบหมายเพิกถอนการอนุญาตนั้นและผู้ได้รับอนุญาตดังกล่าวจะต้องรับผิดชอบต่อความเสียหาย
                    ที่เกิดขึ้นทั้งสิ้นทุกประการ</li>
                <li class="list-item">
                    ผู้ได้รับอนุญาตให้ใช้อาคารสถานที่ต้องสงวนและใช้ทรัพย์สินเช่นวิญญูชนจะพึงปฏิบัติต่อทรัพย์สินของตนเอง
                    หากในระหว่างการใช้อาคารสถานที่ปรากฏว่าอาคารสถานที่ที่ขอใช้สูญหายหรือเกิดความชำรุดเสียหาย
                    อันเนื่องมาจากการใช้งาน ผู้ได้รับอนุญาตต้องรับผิดชอบชดใช้ต่อการสูญหายหรือเสียหาย
                    และมหาวิทยาลัยมีสิทธิ
                    เรียกค่าเสียหายเพิ่ม (หากมี) ได้เต็มจำนวนความเสียหาย หรือจัดการซ่อมแซมให้อยู่ในสภาพเดิม แล้วแต่กรณี
                    <div class="row justify-content-center text-center align-items-center">

                        @foreach ($booking as $bk)
                            @if ($bk->id == $_GET['booking_id'])
                                <div class="d-flex justify-content-center form-check align-items-center">
                                    <input class="form-check-input" type="radio" name="bk_confirm" id="confirm1"
                                        value="1" required @if ($bk->bk_confirm == 1) checked @endif>
                                    <label class="form-check-label mx-3" for="confirm1">
                                        ยินดีให้มหาวิทยาลัยหักเงินประกันความเสียหาย
                                    </label>

                                    <input class="form-check-input mx-3" type="radio" name="bk_confirm" id="confirm2"
                                        value="2" required @if ($bk->bk_confirm == 2) checked @endif>
                                    <label class="form-check-label" for="confirm2">
                                        ยินดีแก้ไขให้กลับสู่สภาพเดิม
                                    </label>
                                </div>
                            @endif
                        @endforeach
                        <span style="color: #ff0000">( *** กรุณาเลือกเพื่อดำเนินการต่อ *** )</span>
                        <input type="text" name="booking_id" value="{{ $_GET['booking_id'] }}" hidden>
                    </div>
                </li>
                <li class="list-item">ผู้ได้รับอนุญาตต้องชำระค่าธรรมเนียมการใช้อาคารสถานที่และค่าประกันความเสียหาย
                    ตามที่มหาวิทยาลัยประกาศกำหนด
                    โดยให้ชำระเงินมัดจำให้มหาวิทยาลัยภายใน 7 วันทำการ หลังจากที่ได้รับหนังสือแจ้งการอนุญาตให้ใช้
                    อาคารสถานที่ และชำระส่วนที่เหลือทั้งหมดก่อนวันจัดงานไม่น้อยกว่า 7 วันทำการ หากไม่ชำระตามระยะเวลา
                    ที่กำหนด มหาวิทยาลัยขอสงวนสิทธิ์ในการบอกเลิกการใช้อาคารสถานที่
                    และจะไม่คืนเงินมัดจำที่ได้รับชำระไว้แล้ว
                </li>
                <li class="list-item">กรณีผู้ได้รับอนุญาตขอยกเลิกหรือถูกเพิกถอนการอนุญาต
                    มหาวิทยาลัยอาจคืนเงินค่าธรรมเนียมการใช้อาคาร
                    สถานที่ในส่วนของค่าสาธารณูปโภคและค่าตอบแทนเจ้าหน้าที่ให้ผู้ได้รับอนุญาตแล้วแต่กรณ</li>
                <li class="list-item">กรณีที่มหาวิทยาลัยเป็นผู้ขอยกเลิกการใช้อาคารสถานที่
                    มหาวิทยาลัยจะคืนเงินค่าธรรมเนียม
                    การขอใช้
                    อาคารสถานที่ในส่วนที่ได้ชำระกับมหาวิทยาลัยไว้แล้วให้กับผู้ได้รับอนุญาต</li>
                <li class="list-item">ผู้ได้รับอนุญาตต้องกำกับดูแลร้านประกอบอาหารไม่ให้ทิ้งเศษอาหารไว้ในมหาวิทยาลัย
                    หากมหาวิทยาลัยพบว่าร้าน
                    ประกอบการทิ้งเศษอาหารไว้ข้าพเจ้า/หน่วยงาน ยินยอมให้หักเงินประกันความเสียหาย </li>
                <li class="list-item">กรณีมีการใช้ไฟฟ้ามากกว่าปกติ เช่น ติดตั้งระบบไฟฟ้าทางเข้างาน หรือระบบแสง สี
                    เสียงบนเวทีการแสดง เป็นต้น
                    จะต้องชำระค่าไฟฟ้าเพิ่ม ชั่วโมงละ 1,000 บาท/ระบบ หรือนำเครื่องปั่นไฟมาใช้ในการจัดงาน</li>
                <li class="list-item">กรณีที่ใช้เครื่องปรับอากาศ
                    มหาวิทยาลัยจะเปิดเครื่องปรับอากาศให้เฉพาะวันที่จัดงานเท่านั้น และจะเปิดให้ก่อนเริ่มงาน 1 ชั่วโมง
                </li>
                <li class="list-item">มหาวิทยาลัยอนุญาตให้เข้ามาจัดเตรียมสถานที่ล่วงหน้าก่อนการจัดงานได้ 1 วัน
                    ตั้งแต่เวลา
                    08.30 - 16.30 น.
                    และงดเปิดเครื่องปรับอากาศ หากมหาวิทยาลัยพบว่ามีการเปิดเครื่องปรับอากาศ ข้าพเจ้า/หน่วยงาน
                    ยินดีชำระค่า
                    ไฟฟ้าตามที่มหาวิทยาลัยกำหนด กรณีที่จะต้องเตรียมงานมากกว่าที่กำหนดจะต้องมีหนังสือขออนุญาตมหาวิทยาลัย
                    และเมื่อเสร็จสิ้นการจัดงานขอให้เก็บสถานที่ให้เรียบร้อยภายในวันจัดงานนั้น</li>
                <li class="list-item">มหาวิทยาลัยอนุญาตให้ใช้สถานที่เพื่อจัดงานเท่านั้น มิใช่สถานที่รับฝากทรัพย์สิน
                    ดังนั้น มหาวิทยาลัยจะไม่
                    รับผิดชอบต่อทรัพย์สินที่เสียหายหรือสูญหาย</li>
                <li class="list-item">เมื่อปรากฏโดยชัดแจ้งผู้ได้รับอนุญาตกระทำผิดเงื่อนไขอย่างใดอย่างหนึ่ง
                    มหาวิทยาลัยมีอ
                    ำนาจสั่งระงับการใช้สถานที่นั้นได้
                    โดยผู้ได้รับอนุญาตไม่มีสิทธิเรียกร้องค่าเสียหายที่เกิดขึ้น</li>
            </ol>
            <p style="text-indent:5vw">
                ทั้งนี้
                ข้าพเจ้าทราบข้อตกลงในการใช้อาคารสถานที่ของมหาวิทยาลัยเทคโนโลยีราชมงคลสุวรรณภูมิดังกล่าวเรียบร้อยแล้ว
                จึงได้ลงลายมือชื่อไว้เป็นสำคัญและต่างยึดถือฝ่ายละหนึ่งฉบับ
            </p>
            <div class="row justify-content-center text-center align-items-center mt-5">
                <div class="col-6 form-check">
                    <p>(........................................................................................) </p>
                    <p> ................................................................................. </p>
                    <p> อธิการบดีหรือผู้ที่อธิการบดีมอบหมาย </p>
                    <p> .............../......................../..................... </p>
                </div>
                <div class="col-6 form-check">
                    <p>(........................................................................................) </p>
                    <p> ................................................................................. </p>
                    <p> ผู้ขอใช้บริการสถานที่ </p>
                    <p> .............../......................../..................... </p>
                </div>
            </div>
        </div>

        <div class="gap-3 d-flex justify-content-center my-4">
            <button type="button" class="btn btn-danger col-auto" onclick="deleteBooking('{{ $_GET['booking_id'] }}')">
                ยกเลิกการจอง
            </button>
            <input type="submit" class="btn btn-primary col-auto px-5" id="subminConfirm" value="ยืนยัน">
        </div>



    </form>
</div>


<script>
    // $(document).ready(function() {
    //     $('#confirm1').on('change', function() {
    //         $(this).closest("form").submit();
    //     });
    //     $('#confirm2').on('change', function() {
    //         $(this).closest("form").submit();
    //     });
    // });

    function deleteBooking(id) {
        Swal.fire({
            title: "คุณแน่ใจไหม?",
            text: "คุณจะไม่ได้รับเงินมัดจำคืนหากยกเลิก!",
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
                    url: '/deletebooking/' + id,
                    method: 'POST',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        Swal.fire({
                            title: "ลบแล้ว!",
                            text: "ยกเลิกการจองของคุณแล้ว.",
                            icon: "success"
                        }).then(() => {
                            // Reload the page after successful deletion
                            location.reload();
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            title: "ลบไม่สำเร็จ!",
                            text: "ไฟล์ของคุณยังไม่ถูกลบ.",
                            icon: "error"
                        });
                        console.log("AJAX Request Error:", status, error);
                    }
                });

            }
        });
    }
</script>
