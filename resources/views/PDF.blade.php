<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Language" content="th" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>เอกสารการจองหอประชุม</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }

        body {
            font-family: "THSarabunNew";
            font-size: 13px;
        }

        #pdf1 .table-bordered tr,
        #pdf1 .table-bordered td,
        #pdf1 .table-bordered th {
            border-collapse: collapse;
            border: 1px solid;
            font-size: 13px;
            /* font-weight: bold; */
        }

        #pdf3 .table-bordered tr,
        #pdf3 .table-bordered td,
        #pdf3 .table-bordered th {
            border-collapse: collapse;
            border: 1px solid;
            font-size: 16px;
            /* font-weight: bold; */
        }
    </style>
</head>

<body>
    @foreach ($booking as $bk)
        <div class="row align-items-center">
            <div class="row" id="pdf1">
                <div class="text-center">
                    <span class="fw-bold">แบบคำขอใช้อาคารสถานที่มหาวิทยาลัยเทคโนโลยีราชมงคลสุวรรณภูมิ</span><br>
                </div>
                <div class="text-end">
                    <span>เขียนที่ ..........................................................................</span><br>
                    <span>วันที่ ............. เดือน ............................. พ.ศ ..............</span><br>
                </div>
                <span>เรียน อธิการบดีมหาวิทยาลัยเทคโนโลยีราชมงคลสุวรรณภูมิ</span><br>
                <span class="fw-bold">ส่วนที่ 1 สำหรับผู้ขอใช้อาคารสถานที่</span><br>
                <span style="padding-left:40px">
                    ข้าพเจ้า.................{{ $bk->fullname }}...................อยู่บ้านเลขที่..........{{ $bk->housenumber }}.............หมู่ที่.........{{ $bk->village }}..........ถนน.................{{ $bk->road }}..........................................
                </span>
                <span>ตำบล/แขวง...............{{ $bk->subdistrict }}.....................อำเภอ/เขต..................{{ $bk->district }}.............................จังหวัด..................{{ $bk->province }}................................................................
                </span>
                <span>หมายเลขโทรศัพท์.........{{ $bk->phone }}...................มีความประสงค์ขอใช้...........{{ $bk->bk_location_for }}...........................ดังต่อไปนี้
                </span><br>
                <span style="padding-left:40px">
                    1.
                    ข้าพเจ้ามีความประสงค์ขอใช้สถานที่เพื่อ......{{ $bk->bk_location_for }}...........................ในวันที่.....{{ $bk->bk_str_date }}
                    ถึง
                    {{ $bk->bk_end_date }}....................................................................................................
                </span><br>
                <span>ตั้งแต่เวลา............{{ $bk->bk_str_time }} ถึง
                    {{ $bk->bk_end_time }}.........................................
                    โดยมีผู้มาร่วมงาน ประมาณ.................{{ $bk->bk_people_number }}................. คน</span><br>
                <span style="padding-left:40px">
                    2. ข้าพเจ้ายินดีชำระเงินค่าธรรมเนียมการขอใช้อาคารสถานที่ตามที่มหาวิทยาลัยกำหนด
                    เป็นจำนวนเงิน......................{{ $bk->maintenance }}..............................บาท
                    และค่าประกันความเสียหาย......................{{ $bk->damage_insurance }}...........................................บาท
                </span><br>
                <span style="padding-left:40px">
                    3. หากการใช้อาคารสถานที่ตลอดจนทรัพย์สินและอุปกรณ์ต่างๆ สูญหาย
                    หรือเกิดความชำรุดเสียหายอันเนื่องมาจากการใช้อาคารสถานที่นั้นๆ
                    ข้าพเจ้ายินดีรับผิดชอบชดใช้ต่อการสูญหาย
                    หรือเสียหาย หรือจัดการซ่อมแซมให้อยู่ในสภาพเดิม</span><br>
                <span style="padding-left:40px">
                    4. ข้าพเจ้ายินดีชำระเงินมัดจำ (ค่าบำรุงสถานที่)ซึ่งเป็นส่วนหนึ่งของค่าธรรมเนียมการขอใช้อาคารสถานที่
                    เป็นจำนวนเงิน.........................{{ $bk->damage_insurance }}...................................บาท
                    ภายใน 7 วันทำการ
                    หลังจากที่ได้รับหนังสือแจ้งการอนุญาตให้ใช้อาคารสถานที่
                    และจะชำระส่วนที่เหลือทั้งหมด
                    (ค่าสาธารณูปโภค, ค่าตอบแทนเจ้าหน้าที่, ค่าใช้จ่ายอื่นๆ)
                    ก่อนวันจัดงานไม่น้อยกว่า 7 วันทำการ
                    เป็นจำนวนเงิน....................{{ $bk->utilities + $bk->officer_compensation + $bk->other_expenses }}..........................บาท
                </span><br>
                <span style="padding-left:40px">ข้าพเจ้าได้ทราบหลักเกณฑ์ และเงื่อนไขการใช้อาคารสถานที่แล้ว
                    และจะปฏิบัติให้ถูกต้องตามข้อบังคับของมหาวิทยาลัย
                    หากมีการฝ่าฝืนหรือการกระทำใด ๆ อันเป็นการผิดข้อบังคับ หรือระเบียบแบบแผนของทางราชการ
                    ข้าพเจ้ายินดีให้ยกเลิกการอนุญาตการใช้
                    อาคารสถานที่ดังกล่าวได้</span><br>
                <div class="text-end">
                    <span>ลงชื่อ.................................................. ผู้ยื่นคำขอ</span><br>
                    <span>(..................{{ $bk->fullname }}..................)</span><br>
                </div>
                <span class="fw-bold"> ส่วนที่ 2 สำหรับเจ้าหน้าที่</span><br>
                <span>ความเห็นของผู้รับผิดชอบ</span><br>
                <span>.............................................................................................................................................................................................................................................................................................................................................</span><br>
                <span>รายละเอียดค่าธรรมเนียมการขอใช้อาคารสถานที่</span><br>
                <div class="row text-center">
                    <span>
                        <span class="mx-4">1. ค่าบำรุงสถานที่ ..................................................
                            บาท</span>
                        <span class="mx-4">2. ค่าสาธารณูปโภค.............................................
                            บาท</span>
                    </span><br>
                    <span>
                        <span class="mx-4">3. ค่าตอบแทนเจ้าหน้าที่ ........................................
                            บาท</span>
                        <span class="mx-4">4. ค่าใช้จ่ายอื่น ๆ .............................................
                            บาท</span>
                    </span><br>
                    <span>รวมเป็นจำนวนเงินทั้งสิ้น ...........................................................
                        บาท</span><br>
                    <span>ค่าประกันความเสียหาย ............................................................
                        บาท</span><br>

                    <span>ลงชื่อ...................................................................ผู้รับผิดชอบ</span><br>
                    <span>(......................................................................)</span><br>
                    <span>วัน............เดือน........................พ.ศ......................</span><br>
                </div><br>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td style="padding-left: 10px;padding-right: 10px;border: 1px solid #000">
                                <span class="fw-bold">
                                    ความเห็นของผู้อำนวยการกอง....................................................................................
                                </span><br>
                                <span> O เห็นควรอนุญาต</span><br>
                                <span> O ไม่เห็นควรอนุญาต
                                    เนื่องจาก.........................................................................................<span><br>
                                        <div class="row text-end">
                                            <span>ลงชื่อ...........................................................</span><br>
                                            <span>(..............................................................)</span><br>
                                            <span>วัน...........เดือน.........................พ.ศ.
                                                .................</span><br>
                                        </div>
                            </td>
                            <td style="padding-left: 10px;padding-right: 10px;border: 1px solid #000">
                                <span class="fw-bold">ความเห็นของอธิการบดีหรือผู้ที่อธิการบดีมอบหมาย</span><br>
                                <span> O อนุญาต</span><br>
                                <span> O ไม่อนุญาต
                                    เนื่องจาก................................................................................................<span><br>
                                        <div class="row text-end">
                                            <span>
                                                ลงชื่อ...........................................................</span><br>
                                            <span>(..............................................................)</span><br>
                                            <span>วัน...........เดือน.........................พ.ศ.
                                                .................</span><br>
                                        </div>
                            </td>
                        </tr>
                    </tbody>
                </table><br>
                <span class="fw-bold">ส่วนที่ 3 การชำระเงิน</span><br>
                <span style="padding-left:40px">
                    ชำระเงินมัดจำเป็นจำนวนเงิน..............................................................บาท
                    ใบเสร็จเล่มที่.........................................เลขที่.....................................วันที่..................................................
                </span><br>
                <span style="padding-left:40px">ชำระในส่วนที่เหลือทั้งหมด
                    เป็นจำนวนเงิน........................................................บาท
                    ใบเสร็จเล่มที่.........................................เลขที่.....................................วันที่...............................
                </span><br>
                <span style="padding-left:40px">ชำระค่าประกันความเสียหาย
                    เป็นจำนวนเงิน........................................................บาท
                    ใบเสร็จเล่มที่.........................................เลขที่.....................................วันที่..............................
                </span>
            </div>
            <div class="row" id="pdf2" style="font-size: 16px">
                <div class="text-center">
                    <span class="fw-bold">ข้อตกลงในการใช้อาคารสถานที่ของมหาวิทยาลัยเทคโนโลยีราชมงคลสุวรรณภูมิ</span><br>
                </div>
                <br>

                <span>1. การใช้อาคารสถานที่ของมหาวิทยาลัย
                    ผู้ได้รับอนุญาตให้ใช้อาคารสถานที่จะต้องปฏิบัติให้เป็นไปตามกฎหมาย
                    ระเบียบ ข้อบังคับ วัฒนธรรม ประเพณี
                    และไม่ขัดต่อความสงบเรียบร้อยและศีลธรรมอันดีและหลักเกณฑ์
                    ที่มหาวิทยาลัยกำหนด หากมีการใช้อาคารสถานที่เพื่อการอย่างอื่นนอกเหนือจากที่ได้รับอนุญาต
                    ให้อธิการบดี
                    หรือผู้ที่อธิการบดีมอบหมายเพิกถอนการอนุญาตนั้นและผู้ได้รับอนุญาตดังกล่าวจะต้องรับผิดชอบต่อความเสียหาย
                    ที่เกิดขึ้นทั้งสิ้นทุกประการ</span><br>
                <span>2.
                    ผู้ได้รับอนุญาตให้ใช้อาคารสถานที่ต้องสงวนและใช้ทรัพย์สินเช่นวิญญูชนจะพึงปฏิบัติต่อทรัพย์สินของตนเอง
                    หากในระหว่างการใช้อาคารสถานที่ปรากฏว่าอาคารสถานที่ที่ขอใช้สูญหายหรือเกิดความชำรุดเสียหาย
                    อันเนื่องมาจากการใช้งาน ผู้ได้รับอนุญาตต้องรับผิดชอบชดใช้ต่อการสูญหายหรือเสียหาย
                    และมหาวิทยาลัยมีสิทธิ
                    เรียกค่าเสียหายเพิ่ม (หากมี) ได้เต็มจำนวนความเสียหาย หรือจัดการซ่อมแซมให้อยู่ในสภาพเดิม
                    แล้วแต่กรณี

                </span><br>
                <p class="text-center mt-2">
                    <input type="radio" name="bk_confirm" value="1"
                        @if ($bk->bk_confirm == 1) checked @endif id="bk_confirm1">
                    <label class="form-check-label" for="bk_confirm1">
                        ยินดีให้มหาวิทยาลัยหักเงินประกันความเสียหาย
                    </label>
                    <input type="radio" name="bk_confirm" value="2"
                        @if ($bk->bk_confirm == 2) checked @endif id="bk_confirm2">
                    <label class="form-check-label" for="bk_confirm2">
                        ยินดีแก้ไขให้กลับสู่สภาพเดิม
                    </label>
                </p>
                <span>
                    3. ผู้ได้รับอนุญาตต้องชำระค่าธรรมเนียมการใช้อาคารสถานที่และค่าประกันความเสียหาย
                    ตามที่มหาวิทยาลัยประกาศกำหนด
                    โดยให้ชำระเงินมัดจำให้มหาวิทยาลัยภายใน 7 วันทำการ
                    หลังจากที่ได้รับหนังสือแจ้งการอนุญาตให้ใช้
                    อาคารสถานที่ และชำระส่วนที่เหลือทั้งหมดก่อนวันจัดงานไม่น้อยกว่า 7 วันทำการ
                    หากไม่ชำระตามระยะเวลา
                    ที่กำหนด มหาวิทยาลัยขอสงวนสิทธิ์ในการบอกเลิกการใช้อาคารสถานที่
                    และจะไม่คืนเงินมัดจำที่ได้รับชำระไว้แล้ว
                </span><br>
                <span>4. กรณีผู้ได้รับอนุญาตขอยกเลิกหรือถูกเพิกถอนการอนุญาต
                    มหาวิทยาลัยอาจคืนเงินค่าธรรมเนียมการใช้อาคาร
                    สถานที่ในส่วนของค่าสาธารณูปโภคและค่าตอบแทนเจ้าหน้าที่ให้ผู้ได้รับอนุญาตแล้วแต่กรณ</span><br>
                <span>5. กรณีที่มหาวิทยาลัยเป็นผู้ขอยกเลิกการใช้อาคารสถานที่
                    มหาวิทยาลัยจะคืนเงินค่าธรรมเนียม
                    การขอใช้
                    อาคารสถานที่ในส่วนที่ได้ชำระกับมหาวิทยาลัยไว้แล้วให้กับผู้ได้รับอนุญาต</span><br>
                <span>6.
                    ผู้ได้รับอนุญาตต้องกำกับดูแลร้านประกอบอาหารไม่ให้ทิ้งเศษอาหารไว้ในมหาวิทยาลัย
                    หากมหาวิทยาลัยพบว่าร้าน
                    ประกอบการทิ้งเศษอาหารไว้ข้าพเจ้า/หน่วยงาน ยินยอมให้หักเงินประกันความเสียหาย </span><br>
                <span>7. กรณีมีการใช้ไฟฟ้ามากกว่าปกติ เช่น ติดตั้งระบบไฟฟ้าทางเข้างาน
                    หรือระบบแสง
                    สี
                    เสียงบนเวทีการแสดง เป็นต้น
                    จะต้องชำระค่าไฟฟ้าเพิ่ม ชั่วโมงละ 1,000 บาท/ระบบ หรือนำเครื่องปั่นไฟมาใช้ในการจัดงาน
                </span><br>
                <span>8. กรณีที่ใช้เครื่องปรับอากาศ
                    มหาวิทยาลัยจะเปิดเครื่องปรับอากาศให้เฉพาะวันที่จัดงานเท่านั้น และจะเปิดให้ก่อนเริ่มงาน 1
                    ชั่วโมง
                </span><br>
                <span>9. มหาวิทยาลัยอนุญาตให้เข้ามาจัดเตรียมสถานที่ล่วงหน้าก่อนการจัดงานได้ 1
                    วัน
                    ตั้งแต่เวลา
                    08.30 - 16.30 น.
                    และงดเปิดเครื่องปรับอากาศ หากมหาวิทยาลัยพบว่ามีการเปิดเครื่องปรับอากาศ ข้าพเจ้า/หน่วยงาน
                    ยินดีชำระค่า
                    ไฟฟ้าตามที่มหาวิทยาลัยกำหนด
                    กรณีที่จะต้องเตรียมงานมากกว่าที่กำหนดจะต้องมีหนังสือขออนุญาตมหาวิทยาลัย
                    และเมื่อเสร็จสิ้นการจัดงานขอให้เก็บสถานที่ให้เรียบร้อยภายในวันจัดงานนั้น</span><br>
                <span>10. มหาวิทยาลัยอนุญาตให้ใช้สถานที่เพื่อจัดงานเท่านั้น
                    มิใช่สถานที่รับฝากทรัพย์สิน
                    ดังนั้น มหาวิทยาลัยจะไม่
                    รับผิดชอบต่อทรัพย์สินที่เสียหายหรือสูญหาย</span><br>
                <span>11. เมื่อปรากฏโดยชัดแจ้งผู้ได้รับอนุญาตกระทำผิดเงื่อนไขอย่างใดอย่างหนึ่ง
                    มหาวิทยาลัยมีอ
                    ำนาจสั่งระงับการใช้สถานที่นั้นได้
                    โดยผู้ได้รับอนุญาตไม่มีสิทธิเรียกร้องค่าเสียหายที่เกิดขึ้น</span><br>
                <span style="padding-left:40px">
                    ทั้งนี้
                    ข้าพเจ้าทราบข้อตกลงในการใช้อาคารสถานที่ของมหาวิทยาลัยเทคโนโลยีราชมงคลสุวรรณภูมิดังกล่าวเรียบร้อยแล้ว
                    จึงได้ลงลายมือชื่อไว้เป็นสำคัญและต่างยึดถือฝ่ายละหนึ่งฉบับ
                </span><br>

                <table class="table table-bordered text-center mt-4">
                    <tbody>
                        <tr>
                            <td style="padding-left: 10px;padding-right: 10px;">
                                <span>(........................................................................................)
                                </span><br>
                                <span> .................................................................................
                                </span><br>
                                <span> อธิการบดีหรือผู้ที่อธิการบดีมอบหมาย </span><br>
                                <span> .............../......................../..................... </span><br>
                            </td>
                            <td style="padding-left: 10px;padding-right: 10px;">
                                <span>(........................................................................................)
                                </span><br>
                                <span> ........................ {{ $bk->fullname }} ........................
                                </span><br>
                                <span> ผู้ขอใช้บริการสถานที่ </span><br>
                                <span> .............../......................../..................... </span><br>
                            </td>
                        </tr>
                    </tbody>
                </table><br>
            </div>
            <div class="row" id="pdf3" style="font-size: 16px">
                <div><b>สิ่งที่ผู้จัดงานต้องเตรียมให้ฝ่ายโสตทัศนูปกรณ์</b></div>
                <div>- ไฟล์ภาพหรือวิดีโอขนาด 1920x1080 (นามสกุล .jpg หรือ .mp4)</div>
                <div>- ไฟล์วิดีโอพรีเจนเทชั่นสำหรับเปิดออกจอภาพ (กรณีที่มี)</div>
                <div>- ไฟล์เพลงสำหรับเปิดในงาน</div>
                <div>- ผู้ประสานงานในการบอกคิวการเปิดวิดีโอพรีเซนเทชั่นและเพลงประกอบ</div>
                <div>- กำหนดการของงาน</div>
                <div><b> วงดนตรีที่ผู้จัดงานเตรียมมานั้นเป็นแบบใด</b></div>
                <div>- แบบที่ 1 : วงดนตรีครบชุดมีเพาเวอร์แอมป์ ตู้ลำโพงมาเอง<small style="padding-right: 200px"></small>
                    <span class="mx-5">
                        <input type="radio" name="bk_music_brand" value="1"
                            @if ($bk->bk_music_brand == 1) checked @endif id="bk_music_brand1">
                        <label class="form-check-label" for="bk_music_brand1">
                            ใช้
                        </label>
                        <input type="radio" name="bk_music_brand" value="2"
                            @if ($bk->bk_music_brand == 2) checked @endif id="bk_music_brand2">
                        <label class="form-check-label" for="bk_music_brand2">
                            ไม่ใช้
                        </label>
                    </span>
                </div>
                <div>- แบบที่ 2 : มีเฉพาะเครื่องดนตรี เช่น กีต้าร์ กลอง ไม่มีเพาเวอร์แอมป์ ตู้ลำโพง<small
                        style="padding-right: 50px"></small>
                    <span class="mx-5">
                        <input type="radio" name="bk_music_equipment" @if ($bk->bk_music_equipment == 1) checked @endif
                            id="bk_music_equipment1">
                        <label class="form-check-label" for="bk_music_equipment1">
                            ใช้
                        </label>
                        <input type="radio" name="bk_music_equipment" @if ($bk->bk_music_equipment == 2) checked @endif
                            id="bk_music_equipment2">
                        <label class="form-check-label" for="bk_music_equipment2">
                            ไม่ใช้
                        </label>
                    </span>
                </div>
                <div> - กรณีเป็นแบบที่ 2 ต้องการต่อเครื่องดนตรีเข้ากับระบบเสียงของหอประชุมหรือไม่ <small
                        style="padding-right: 45px"></small>
                    <span class="mx-5">
                        <input type="radio" name="bk_music_details" @if ($bk->bk_music_details == 1) checked @endif
                            id="bk_music_details1">
                        <label class="form-check-label" for="bk_music_details1">
                            ใช้
                        </label>
                        <input type="radio" name="bk_music_details" @if ($bk->bk_music_details == 2) checked @endif
                            id="bk_music_details2">
                        <label class="form-check-label" for="bk_music_details2">
                            ไม่ใช้
                        </label>
                    </span>
                </div> <br>
                <div class="row text-center">
                    <b>รายการขอใช้วัสดุ อุปกรณ์
                        (ด้านโสตทัศนูปกรณ์)
                        ในการขอใช้หอประชุม{{ $bk->room_name }}<br>
                        ของ...............................................................................................
                        ในวันที่
                        ....................................................................</b>
                </div>
                <div>
                    <table class="table table-bordered mt-3">
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
                                    <input type="radio" name="bk_sound" value="1" id="bk_sound1" required
                                        @if ($bk->bk_sound == 1) checked @endif>
                                    <label class="form-check-label" for="bk_sound1">
                                        ใช้
                                    </label>
                                </td>
                                <td class="text-center">
                                    <input type="radio" name="bk_sound" value="2" id="bk_sound2" required
                                        @if ($bk->bk_sound == 2) checked @endif>
                                    <label class="form-check-label" for="bk_sound2">
                                        ไม่ใช้
                                    </label>
                                </td>
                                <td>{{ $bk->bk_sound_node }}</td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>จอภาพขนาดใหญ่บนเวที่ 1 จอ</td>
                                <td class="text-center">
                                    <input type="radio" name="bk_screen_big" value="1" id="bk_screen_big1"
                                        required @if ($bk->bk_screen_big == 1) checked @endif>
                                    <label class="form-check-label" for="bk_screen_big1">
                                        ใช้
                                    </label>
                                </td>
                                <td class="text-center">
                                    <input type="radio" name="bk_screen_big" value="2" id="bk_screen_big2"
                                        required @if ($bk->bk_screen_big == 2) checked @endif>
                                    <label class="form-check-label" for="bk_screen_big2">
                                        ไม่ใช้
                                    </label>
                                </td>
                                <td>{{ $bk->bk_screen_big_note }}</td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td>จอภาพทีวีด้านข้างฝั่งซ้าย 4 จอ</td>
                                <td class="text-center">
                                    <input type="radio" name="bk_tv_left" value="1" id="bk_tv_left1" required
                                        @if ($bk->bk_tv_left == 1) checked @endif>
                                    <label class="form-check-label" for="bk_tv_left2">
                                        ใช้
                                    </label>
                                </td>
                                <td class="text-center">
                                    <input type="radio" name="bk_tv_left" value="2" id="bk_tv_left1" required
                                        @if ($bk->bk_tv_left == 2) checked @endif>
                                    <label class="form-check-label" for="bk_tv_left2">
                                        ไม่ใช้
                                    </label>
                                </td>
                                <td>{{ $bk->bk_tv_left_note }}</td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td>จอภาพทีวีด้านข้างฝั่งขวา 4 จอ</td>
                                <td class="text-center">
                                    <input type="radio" name="bk_tv_right" value="1" id="bk_tv_right1"
                                        required @if ($bk->bk_tv_right == 1) checked @endif>
                                    <label class="form-check-label" for="bk_tv_right1">
                                        ใช้
                                    </label>
                                </td>
                                <td class="text-center">
                                    <input type="radio" name="bk_tv_right" value="2" id="bk_tv_right2"
                                        required @if ($bk->bk_tv_right == 2) checked @endif>
                                    <label class="form-check-label" for="bk_tv_right2">
                                        ไม่ใช้
                                    </label>
                                </td>
                                <td>{{ $bk->bk_tv_right_note }}</td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td>โต๊ะปฏิบัติการหน้าขาว 10 ตัว</td>
                                <td class="text-center">
                                    <input type="radio" name="bk_table" value="1" id="bk_table1" required
                                        @if ($bk->bk_music_details == 1) checked @endif>
                                    <label class="form-check-label" for="bk_table1">
                                        ใช้
                                    </label>
                                </td>
                                <td class="text-center">
                                    <input type="radio" name="bk_table" value="2" id="bk_table2" required
                                        @if ($bk->bk_music_details == 2) checked @endif>
                                    <label class="form-check-label" for="bk_table2">
                                        ไม่ใช้
                                    </label>
                                </td>
                                <td>{{ $bk->bk_table_note }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    @endforeach

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
