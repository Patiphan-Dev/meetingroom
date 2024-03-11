<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Language" content="th" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>เอกสารการจองหอประชุม</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        ol {
            list-style-type: none;
            counter-reset: item;
            margin: 0;
            padding: 0;
            padding-right:
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

        .form-check-input {
            background-color: #ffffff;
            border-color: #000000;
        }

        .form-check-input:checked {
            background-color: #000000;
            border-color: #000000;
        }
    </style>
</head>

<body>
    <div class="container mt-5 mb-5">

        {{-- <a href="{{ route('downloadPDF', ['id' => $id]) }}" class="btn text-bg-danger float-end" target="_blank">
            <i class="fa-regular fa-file-pdf"></i> Print PDF
        </a> --}}
        <h2 class="text-center stong" style="color: red">กรุณาตรวจสอบข้อมูลการจองหอประชุม {{ $id }}</h2>
        <hr>

        <div class="row mt-3">

            @foreach ($booking as $bk)
                @if ($bk->id == $id)
                    <div class="row align-items-center">
                        <div class="row">
                            <div class="text-center">
                                <p class="fw-bold">แบบคำขอใช้อาคารสถานที่มหาวิทยาลัยเทคโนโลยีราชมงคลสุวรรณภูมิ</p>
                            </div>
                            <div class="text-end">
                                <p>เขียนที่ ..........................................................................
                                </p>
                                <p>วันที่ ............. เดือน ............................. พ.ศ ..............</p>
                            </div>
                            <p>เรียน อธิการบดีมหาวิทยาลัยเทคโนโลยีราชมงคลสุวรรณภูมิ</p>
                            <p class="fw-bold">ส่วนที่ 1 สำหรับผู้ขอใช้อาคารสถานที่</p>
                            <p style="text-indent:5vw">
                                ข้าพเจ้า.................{{ $bk->fullname }}...................อยู่บ้านเลขที่..........{{ $bk->housenumber }}.............หมู่ที่.........{{ $bk->village }}..........ถนน..................{{ $bk->road }}..................................................
                            </p>
                            <p>ตำบล/แขวง...............{{ $bk->subdistrict }}.....................อำเภอ/เขต............{{ $bk->district }}.......................จังหวัด..................{{ $bk->province }}.........................................
                            </p>
                            <p>หมายเลขโทรศัพท์.........{{ $bk->phone }}...................มีความประสงค์ขอใช้................{{ $bk->bk_location_for }}......................ดังต่อไปนี้
                            </p>
                            <p style="text-indent:5vw">
                                1.ข้าพเจ้ามีความประสงค์ขอใช้สถานที่เพื่อ...............{{ $bk->bk_location_for }}..................ในวันที่................{{ $bk->bk_str_date }}.....ถึง.....{{ $bk->bk_end_date }}...........................
                            </p>
                            <p>ตั้งแต่เวลา............{{ $bk->bk_str_time }}.....ถึง.....{{ $bk->bk_end_time }}.........................
                                โดยมีผู้มาร่วมงาน ประมาณ.................{{ $bk->bk_people_number }}.................
                                คน
                            </p>
                            <p style="text-indent:5vw">2.
                                ข้าพเจ้ายินดีชำระเงินค่าธรรมเนียมการขอใช้อาคารสถานที่ตามที่มหาวิทยาลัยกำหนด
                                เป็นจำนวนเงิน.......................................{{ $bk->maintenance }}........................................................................................บาท
                                และค่าประกันความเสียหาย......................{{ $bk->damage_insurance }}...........................................บาท
                            </p>
                            <p style="text-indent:5vw">3. หากการใช้อาคารสถานที่ตลอดจนทรัพย์สินและอุปกรณ์ต่างๆ สูญหาย
                                หรือเกิดความชำรุดเสียหายอันเนื่องมาจากการใช้อาคารสถานที่นั้นๆ
                                ข้าพเจ้ายินดีรับผิดชอบชดใช้ต่อการสูญหาย
                                หรือเสียหาย หรือจัดการซ่อมแซมให้อยู่ในสภาพเดิม</p>
                            <p style="text-indent:5vw">4. ข้าพเจ้ายินดีชำระเงินมัดจำ (ค่าบำรุงสถานที่)
                                ซึ่งเป็นส่วนหนึ่งของค่าธรรมเนียมการขอใช้อาคารสถานที่
                                เป็นจำนวนเงิน.........................{{ $bk->damage_insurance }}...................................บาท
                                ภายใน 7 วันทำการ
                                หลังจากที่ได้รับหนังสือแจ้งการอนุญาตให้ใช้อาคารสถานที่
                                และจะชำระส่วนที่เหลือทั้งหมด
                                (ค่าสาธารณูปโภค, ค่าตอบแทนเจ้าหน้าที่, ค่าใช้จ่ายอื่นๆ)
                                ก่อนวันจัดงานไม่น้อยกว่า 7 วันทำการ
                                เป็นจำนวนเงิน....................{{ $bk->utilities + $bk->officer_compensation + $bk->other_expenses }}..........................บาท
                            </p>
                            <p style="text-indent:5vw">ข้าพเจ้าได้ทราบหลักเกณฑ์ และเงื่อนไขการใช้อาคารสถานที่แล้ว
                                และจะปฏิบัติให้ถูกต้องตามข้อบังคับของมหาวิทยาลัย
                                หากมีการฝ่าฝืนหรือการกระทำใด ๆ อันเป็นการผิดข้อบังคับ หรือระเบียบแบบแผนของทางราชการ
                                ข้าพเจ้ายินดีให้ยกเลิกการอนุญาตการใช้
                                อาคารสถานที่ดังกล่าวได้</p>
                            <div class="col-12 text-end">
                                <p>ลงชื่อ.......................................................... ผู้ยื่นคำขอ</p>
                                <p>(........................{{ $bk->fullname }}............................)</p>
                            </div>
                            <p class="fw-bold"> ส่วนที่ 2 สำหรับเจ้าหน้าที่</p>
                            <p>ความเห็นของผู้รับผิดชอบ</p>
                            <p>
                                <hr style="border-top: 2.5px dotted #000;">
                            </p>
                            <p>รายละเอียดค่าธรรมเนียมการขอใช้อาคารสถานที่</p>
                            <div class="row text-center">
                                <p>
                                    <span class="mx-4">1. ค่าบำรุงสถานที่
                                        ..................................................
                                        บาท</span>
                                    <span class="mx-4">2. ค่าสาธารณูปโภค.............................................
                                        บาท</span>
                                </p>
                                <p>
                                    <span class="mx-4">3. ค่าตอบแทนเจ้าหน้าที่
                                        ........................................
                                        บาท</span>
                                    <span class="mx-4">4. ค่าใช้จ่ายอื่น ๆ
                                        .............................................
                                        บาท</span>
                                </p>
                                <p>รวมเป็นจำนวนเงินทั้งสิ้น ...........................................................
                                    บาท
                                </p>
                                <p>ค่าประกันความเสียหาย ............................................................ บาท
                                </p>

                                <p>ลงชื่อ...................................................................ผู้รับผิดชอบ
                                </p>
                                <p>(......................................................................)</p>
                                <p>วัน............เดือน........................พ.ศ......................</p>
                            </div>
                            <table class="table table-bordered border-dark mx-3">
                                <tr class="my-5">
                                    <td>
                                        <p class="fw-bold">
                                            ความเห็นของผู้อำนวยการกอง.......................................................
                                        </p>
                                        <p> O เห็นควรอนุญาต</p>
                                        <p> O ไม่เห็นควรอนุญาต
                                            เนื่องจาก........................................................</p>
                                        <div class="row text-end">
                                            <p>ลงชื่อ...........................................................</p>
                                            <p>(..............................................................)</p>
                                            <p>วัน...........เดือน.........................พ.ศ. .................</p>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="fw-bold">ความเห็นของอธิการบดีหรือผู้ที่อธิการบดีมอบหมาย</p>
                                        <p> O อนุญาต</p>
                                        <p> O ไม่อนุญาต
                                            เนื่องจาก........................................................
                                        </p>
                                        <div class="row text-end">
                                            <p> ลงชื่อ...........................................................</p>
                                            <p>(..............................................................)</p>
                                            <p>วัน...........เดือน.........................พ.ศ. .................</p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <p class="fw-bold">ส่วนที่ 3 การชำระเงิน</p>
                            <p style="text-indent:5vw">
                                ชำระเงินมัดจำเป็นจำนวนเงิน..............................................................................บาท
                                ใบเสร็จเล่มที่..................................เลขที่..........................วันที่................................
                            </p>
                            <p style="text-indent:5vw">ชำระในส่วนที่เหลือทั้งหมด
                                เป็นจำนวนเงิน......................................................บาท
                                ใบเสร็จเล่มที่..................................เลขที่...........................วันที่...............................
                            </p>
                            <p style="text-indent:5vw">ชำระค่าประกันความเสียหาย
                                เป็นจำนวนเงิน....................................................บาท
                                ใบเสร็จเล่มที่...................................เลขที่..........................วันที่...............................
                            </p>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12 mb-5">
                                <h5 class="text-center">
                                    <b>ข้อตกลงในการใช้อาคารสถานที่ของมหาวิทยาลัยเทคโนโลยีราชมงคลสุวรรณภูมิ</b>
                                </h5>
                                <ol class="list-group list-group-numbered">
                                    <li class="list-item">การใช้อาคารสถานที่ของมหาวิทยาลัย
                                        ผู้ได้รับอนุญาตให้ใช้อาคารสถานที่จะต้องปฏิบัติให้เป็นไปตามกฎหมาย
                                        ระเบียบ ข้อบังคับ วัฒนธรรม ประเพณี
                                        และไม่ขัดต่อความสงบเรียบร้อยและศีลธรรมอันดีและหลักเกณฑ์
                                        ที่มหาวิทยาลัยกำหนด
                                        หากมีการใช้อาคารสถานที่เพื่อการอย่างอื่นนอกเหนือจากที่ได้รับอนุญาต
                                        ให้อธิการบดี
                                        หรือผู้ที่อธิการบดีมอบหมายเพิกถอนการอนุญาตนั้นและผู้ได้รับอนุญาตดังกล่าวจะต้องรับผิดชอบต่อความเสียหาย
                                        ที่เกิดขึ้นทั้งสิ้นทุกประการ</li>
                                    <li class="list-item">
                                        ผู้ได้รับอนุญาตให้ใช้อาคารสถานที่ต้องสงวนและใช้ทรัพย์สินเช่นวิญญูชนจะพึงปฏิบัติต่อทรัพย์สินของตนเอง
                                        หากในระหว่างการใช้อาคารสถานที่ปรากฏว่าอาคารสถานที่ที่ขอใช้สูญหายหรือเกิดความชำรุดเสียหาย
                                        อันเนื่องมาจากการใช้งาน ผู้ได้รับอนุญาตต้องรับผิดชอบชดใช้ต่อการสูญหายหรือเสียหาย
                                        และมหาวิทยาลัยมีสิทธิ
                                        เรียกค่าเสียหายเพิ่ม (หากมี) ได้เต็มจำนวนความเสียหาย
                                        หรือจัดการซ่อมแซมให้อยู่ในสภาพเดิม
                                        แล้วแต่กรณี
                                        <p class="text-center mt-2">
                                            <input class="form-check-input" type="radio" name="bk_confirm" value="1"
                                                @if ($bk->bk_confirm == 1) checked @endif id="bk_confirm1">
                                            <label class="form-check-label" for="bk_confirm1">
                                                ยินดีให้มหาวิทยาลัยหักเงินประกันความเสียหาย
                                            </label>
                                            <input class="form-check-input" type="radio" name="bk_confirm" value="2"
                                                @if ($bk->bk_confirm == 2) checked @endif id="bk_confirm2">
                                            <label class="form-check-label" for="bk_confirm2">
                                                ยินดีแก้ไขให้กลับสู่สภาพเดิม
                                            </label>
                                        </p>
                                    </li>
                                    <li class="list-item">
                                        ผู้ได้รับอนุญาตต้องชำระค่าธรรมเนียมการใช้อาคารสถานที่และค่าประกันความเสียหาย
                                        ตามที่มหาวิทยาลัยประกาศกำหนด
                                        โดยให้ชำระเงินมัดจำให้มหาวิทยาลัยภายใน 7 วันทำการ
                                        หลังจากที่ได้รับหนังสือแจ้งการอนุญาตให้ใช้
                                        อาคารสถานที่ และชำระส่วนที่เหลือทั้งหมดก่อนวันจัดงานไม่น้อยกว่า 7 วันทำการ
                                        หากไม่ชำระตามระยะเวลา
                                        ที่กำหนด มหาวิทยาลัยขอสงวนสิทธิ์ในการบอกเลิกการใช้อาคารสถานที่
                                        และจะไม่คืนเงินมัดจำที่ได้รับชำระไว้แล้ว
                                    </li>
                                    <li class="list-item">กรณีผู้ได้รับอนุญาตขอยกเลิกหรือถูกเพิกถอนการอนุญาต
                                        มหาวิทยาลัยอาจคืนเงินค่าธรรมเนียมการใช้อาคาร
                                        สถานที่ในส่วนของค่าสาธารณูปโภคและค่าตอบแทนเจ้าหน้าที่ให้ผู้ได้รับอนุญาตแล้วแต่กรณ
                                    </li>
                                    <li class="list-item">กรณีที่มหาวิทยาลัยเป็นผู้ขอยกเลิกการใช้อาคารสถานที่
                                        มหาวิทยาลัยจะคืนเงินค่าธรรมเนียม
                                        การขอใช้
                                        อาคารสถานที่ในส่วนที่ได้ชำระกับมหาวิทยาลัยไว้แล้วให้กับผู้ได้รับอนุญาต</li>
                                    <li class="list-item">
                                        ผู้ได้รับอนุญาตต้องกำกับดูแลร้านประกอบอาหารไม่ให้ทิ้งเศษอาหารไว้ในมหาวิทยาลัย
                                        หากมหาวิทยาลัยพบว่าร้าน
                                        ประกอบการทิ้งเศษอาหารไว้ข้าพเจ้า/หน่วยงาน ยินยอมให้หักเงินประกันความเสียหาย
                                    </li>
                                    <li class="list-item">กรณีมีการใช้ไฟฟ้ามากกว่าปกติ เช่น ติดตั้งระบบไฟฟ้าทางเข้างาน
                                        หรือระบบแสง
                                        สี
                                        เสียงบนเวทีการแสดง เป็นต้น
                                        จะต้องชำระค่าไฟฟ้าเพิ่ม ชั่วโมงละ 1,000 บาท/ระบบ
                                        หรือนำเครื่องปั่นไฟมาใช้ในการจัดงาน
                                    </li>
                                    <li class="list-item">กรณีที่ใช้เครื่องปรับอากาศ
                                        มหาวิทยาลัยจะเปิดเครื่องปรับอากาศให้เฉพาะวันที่จัดงานเท่านั้น
                                        และจะเปิดให้ก่อนเริ่มงาน 1
                                        ชั่วโมง
                                    </li>
                                    <li class="list-item">
                                        มหาวิทยาลัยอนุญาตให้เข้ามาจัดเตรียมสถานที่ล่วงหน้าก่อนการจัดงานได้ 1 วัน
                                        ตั้งแต่เวลา
                                        08.30 - 16.30 น.
                                        และงดเปิดเครื่องปรับอากาศ หากมหาวิทยาลัยพบว่ามีการเปิดเครื่องปรับอากาศ
                                        ข้าพเจ้า/หน่วยงาน
                                        ยินดีชำระค่า
                                        ไฟฟ้าตามที่มหาวิทยาลัยกำหนด
                                        กรณีที่จะต้องเตรียมงานมากกว่าที่กำหนดจะต้องมีหนังสือขออนุญาตมหาวิทยาลัย
                                        และเมื่อเสร็จสิ้นการจัดงานขอให้เก็บสถานที่ให้เรียบร้อยภายในวันจัดงานนั้น</li>
                                    <li class="list-item">มหาวิทยาลัยอนุญาตให้ใช้สถานที่เพื่อจัดงานเท่านั้น
                                        มิใช่สถานที่รับฝากทรัพย์สิน
                                        ดังนั้น มหาวิทยาลัยจะไม่
                                        รับผิดชอบต่อทรัพย์สินที่เสียหายหรือสูญหาย</li>
                                    <li class="list-item">
                                        เมื่อปรากฏโดยชัดแจ้งผู้ได้รับอนุญาตกระทำผิดเงื่อนไขอย่างใดอย่างหนึ่ง
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
                                        <p>(........................................................................................)
                                        </p>
                                        <p> .................................................................................
                                        </p>
                                        <p> อธิการบดีหรือผู้ที่อธิการบดีมอบหมาย </p>
                                        <p> .............../......................../..................... </p>
                                    </div>
                                    <div class="col-6 form-check">
                                        <p>(........................................................................................)
                                        </p>
                                        <p> ........................ {{ auth()->user()->fullname }}
                                            ........................ </p>
                                        <p> ผู้ขอใช้บริการสถานที่ </p>
                                        <p> .............../......................../..................... </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div><b>สิ่งที่ผู้จัดงานต้องเตรียมให้ฝ่ายโสตทัศนูปกรณ์</b></div>
                                <div>- ไฟล์ภาพหรือวิดีโอขนาด 1920x1080 (นามสกุล .jpg หรือ .mp4)</div>
                                <div>- ไฟล์วิดีโอพรีเจนเทชั่นสำหรับเปิดออกจอภาพ (กรณีที่มี)</div>
                                <div>- ไฟล์เพลงสำหรับเปิดในงาน</div>
                                <div>- ผู้ประสานงานในการบอกคิวการเปิดวิดีโอพรีเซนเทชั่นและเพลงประกอบ</div>
                                <div>- กำหนดการของงาน</div>
                            </div>
                            <br>
                            <div class="col-12 mb-3">
                                <div><b> วงดนตรีที่ผู้จัดงานเตรียมมานั้นเป็นแบบใด</b></div>
                                <div>- แบบที่ 1 : วงดนตรีครบชุดมีเพาเวอร์แอมป์ ตู้ลำโพงมาเอง<small
                                        style="margin-right: 11.7rem"></small>
                                    <span class="mx-5">
                                        <input class="form-check-input" type="radio" name="bk_music_brand"
                                            value="1" @if ($bk->bk_music_brand == 1) checked @endif
                                            id="bk_music_brand1">
                                        <label class="form-check-label" for="bk_music_brand1">
                                            ใช้
                                        </label>
                                        <input class="form-check-input" type="radio" name="bk_music_brand"
                                            value="2" @if ($bk->bk_music_brand == 2) checked @endif
                                            id="bk_music_brand2">
                                        <label class="form-check-label" for="bk_music_brand2">
                                            ไม่ใช้
                                        </label>
                                    </span>
                                </div>
                                <div>- แบบที่ 2 : มีเฉพาะเครื่องดนตรี เช่น กีต้าร์ กลอง ไม่มีเพาเวอร์แอมป์
                                    ตู้ลำโพง<small style="margin-right: 4.3rem"></small>
                                    <span class="mx-5">
                                        <input class="form-check-input" type="radio" name="bk_music_equipment"
                                            @if ($bk->bk_music_equipment == 1) checked @endif id="bk_music_equipment1">
                                        <label class="form-check-label" for="bk_music_equipment1">
                                            ใช้
                                        </label>
                                        <input class="form-check-input" type="radio" name="bk_music_equipment"
                                            @if ($bk->bk_music_equipment == 2) checked @endif id="bk_music_equipment2">
                                        <label class="form-check-label" for="bk_music_equipment2">
                                            ไม่ใช้
                                        </label>
                                    </span>
                                </div>
                                <div> - กรณีเป็นแบบที่ 2 ต้องการต่อเครื่องดนตรีเข้ากับระบบเสียงของหอประชุมหรือไม่ <small
                                        style="margin-right: 3rem"></small>
                                    <span class="mx-5">
                                        <input class="form-check-input" type="radio" name="bk_music_details"
                                            @if ($bk->bk_music_details == 1) checked @endif id="bk_music_details1">
                                        <label class="form-check-label" for="bk_music_details1">
                                            ใช้
                                        </label>
                                        <input class="form-check-input" type="radio" name="bk_music_details"
                                            @if ($bk->bk_music_details == 2) checked @endif id="bk_music_details2">
                                        <label class="form-check-label" for="bk_music_details2">
                                            ไม่ใช้
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="row text-center">
                                    <b>รายการขอใช้วัสดุ อุปกรณ์
                                        (ด้านโสตทัศนูปกรณ์)ในการขอใช้หอประชุม{{ $bk->room_name }}<br>
                                        ของ...............................................................................................
                                        ในวันที่
                                        ....................................................................</b>
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
                                                        value="1" id="bk_sound1" required
                                                        @if ($bk->bk_sound == 1) checked @endif>
                                                    <label class="form-check-label" for="bk_sound1">
                                                        ใช้
                                                    </label>
                                                </td>
                                                <td class="text-center">
                                                    <input class="form-check-input" type="radio" name="bk_sound"
                                                        value="2" id="bk_sound2" required
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
                                                    <input class="form-check-input" type="radio"
                                                        name="bk_screen_big" value="1" id="bk_screen_big1"
                                                        required @if ($bk->bk_screen_big == 1) checked @endif>
                                                    <label class="form-check-label" for="bk_screen_big1">
                                                        ใช้
                                                    </label>
                                                </td>
                                                <td class="text-center">
                                                    <input class="form-check-input" type="radio"
                                                        name="bk_screen_big" value="2" id="bk_screen_big2"
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
                                                    <input class="form-check-input" type="radio" name="bk_tv_left"
                                                        value="1" id="bk_tv_left1" required
                                                        @if ($bk->bk_tv_left == 1) checked @endif>
                                                    <label class="form-check-label" for="bk_tv_left2">
                                                        ใช้
                                                    </label>
                                                </td>
                                                <td class="text-center">
                                                    <input class="form-check-input" type="radio" name="bk_tv_left"
                                                        value="2" id="bk_tv_left1" required
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
                                                    <input class="form-check-input" type="radio" name="bk_tv_right"
                                                        value="1" id="bk_tv_right1" required
                                                        @if ($bk->bk_tv_right == 1) checked @endif>
                                                    <label class="form-check-label" for="bk_tv_right1">
                                                        ใช้
                                                    </label>
                                                </td>
                                                <td class="text-center">
                                                    <input class="form-check-input" type="radio" name="bk_tv_right"
                                                        value="2" id="bk_tv_right2" required
                                                        @if ($bk->bk_tv_right == 2) checked @endif>
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
                                                    <input class="form-check-input" type="radio" name="bk_table"
                                                        value="1" id="bk_table1" required
                                                        @if ($bk->bk_music_details == 1) checked @endif>
                                                    <label class="form-check-label" for="bk_table1">
                                                        ใช้
                                                    </label>
                                                </td>
                                                <td class="text-center">
                                                    <input class="form-check-input" type="radio" name="bk_table"
                                                        value="2" id="bk_table2" required
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
                        <hr>
                        <div class="row justify-content-center mt-5">
                            <h3>หลักฐานการชำระเงิน</h3>
                            <div class="col-4 text-center mt-3">
                                <label for="PayDeposit" class="form-label">
                                    หลักฐานการชำระเงินค่ามัดจำ
                                </label>
                                @if ($bk->bk_slip != null)
                                    <img id="img_bk_slip{{ $bk->id }}" alt="สลิปโอนเงิน"
                                        src="{{ asset($bk->bk_slip) }}"
                                        class="mx-auto d-block img-thumbnail mb-3 img_bk_slip">
                                @else
                                    <div class="alert alert-warning" role="alert">
                                        ยังไม่ชำระเงินค่าบริกาาร
                                    </div>
                                @endif
                            </div>
                            <div class="col-4 text-center mt-3">
                                <label for="PayDeposit" class="form-label">
                                    หลักฐานการชำระเงินค่าบริกาาร
                                </label>
                                @if ($bk->bk_slip2 != null)
                                    <img id="img_bk_slip2{{ $bk->id }}" alt="สลิปโอนเงิน"
                                        src="{{ asset($bk->bk_slip2) }}"
                                        class="mx-auto d-block img-thumbnail mb-3 img_bk_slip2">
                                @else
                                    <div class="alert alert-warning" role="alert">
                                        ยังไม่ชำระเงินค่าบริกาาร
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</body>

</html>
