<style>
    .form-check-input:checked[type=radio] {
        --bs-form-check-bg-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='m6 10 3 3 6-6'/%3e%3c/svg%3e");
        color: #000
    }

    .form-check-input[type=radio] {
        border-radius: 0.25em;
    }

    .form-check-input {
        flex-shrink: 0;
        width: 1.5em;
        height: 1.5em;
        background-color: #ffffff;
        border-color: #000000;
        margin-right: 5px;
    }

    .form-check-input:checked {
        background-color: #000000;
        border-color: #000000;
    }
</style>

<div class="row mb-4 mt-5">
    <h1 class="p-4 mb-4 text-center border-top border-bottom">
        <b>{{ $room->room_name }}</b>
    </h1>

    <div id="carouselRoom" class="carousel slide">
        <div class="row">
            <div class="col-12 col-md-9">
                <div class="carousel-inner">
                    @php
                        $image = explode(',', $room->room_img_path);
                    @endphp
                    @foreach ($image as $key => $img)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset($img) }}" class="d-block w-100" alt="...">
                        </div>
                    @endforeach

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselRoom"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselRoom"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-12 col-md-3 overflow-y-auto mt-2">
                @php
                    $diagram = explode(',', $room->room_diagram_path);
                @endphp
                @foreach ($diagram as $key => $img)
                    <img src="{{ asset($img) }}" class="d-blox w-100 align-items-end {{ $key == 0 ? 'active' : '' }}">
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="row mb-5">
    <div class="col-md-10 mb-3">
        <div class="card">
            <div class="card-body">
                <article class="blog-post">
                    <h3>รายละเอียด</h3>
                    {!! $room->room_details !!}
                </article>
                <article class="blog-post" style="overflow-x:auto;">
                    <table class="table table-bordered border-primary">
                        <thead class="text-center">
                            <th>ค่าบำรุงสถานที่</th>
                            <th>ค่าสารณูปโภค</th>
                            <th>ค่าตอบแทนเจ้าหน้าที่</th>
                            <th>ค่าใช้จ่ายอื่นๆ</th>
                            <th>ค่าใช้จ่ายรวม</th>
                            <th>ค่าประกันความเสียหาย</th>
                        </thead>
                        <tbody>
                            <td class="text-end">{{ $room->maintenance }}</td>
                            <td class="text-end">{{ $room->utilities }}</td>
                            <td class="text-end">{{ $room->officer_compensation }}</td>
                            <td class="text-end">{{ $room->other_expenses }}</td>
                            <td class="text-end">{{ $room->total }}</td>
                            <td class="text-end">{{ $room->damage_insurance }}</td>
                        </tbody>
                    </table>
                </article>
            </div>
        </div>
    </div>
    <div class="col-md-2 text-center">
        <div class="position-sticky" style="top: 8.5rem;">
            <h1 class="fst-italic">
                {{-- href="{{ url('/room/'.$room->id.'/booking') }}" --}}
                <button class="btn btn-warning btn-md" data-bs-toggle="modal"
                    data-bs-target="#exampleModal{{ $room->id }}">
                    <b> <i class="fa-solid fa-check"></i> สร้างการจอง</b>
                </button>
            </h1>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $room->id }}" tabindex="-1"
    aria-labelledby="exampleModal{{ $room->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModal{{ $room->id }}Label">
                    ข้อตกลงในการใช้อาคารสถานที่ของมหาวิทยาลัยเทคโนโลยีราชมงคลสุวรรณภูมิ</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <b class="text-center">ข้อตกลงในการใช้อาคารสถานที่ของมหาวิทยาลัยเทคโนโลยีราชมงคลสุวรรณภูมิ</b>
                    <br>
                    <p>1. การใช้อาคารสถานที่ของมหาวิทยาลัย
                        ผู้ได้รับอนุญาตให้ใช้อาคารสถานที่จะต้องปฏิบัติให้เป็นไปตามกฎหมายระเบียบ ข้อบังคับ วัฒนธรรม
                        ประเพณี
                        และไม่ขัดต่อความสงบเรียบร้อยและศีลธรรมอันดีและหลักเกณฑ์ที่มหาวิทยาลัยกำหนด
                        หากมีการใช้อาคารสถานที่เพื่อการอย่างอื่นนอกเหนือจากที่ได้รับอนุญาต
                        ให้อธิการบดีหรือผู้ที่อธิการบดีมอบหมายเพิกถอนการอนุญาตนั้นและผู้ได้รับอนุญาตดังกล่าวจะต้องรับผิดชอบต่อความเสียหาย
                        ที่เกิดขึ้นทั้งสิ้นทุกประการ</p>
                    <p>2.
                        ผู้ได้รับอนุญาตให้ใช้อาคารสถานที่ต้องสงวนและใช้ทรัพย์สินเช่นวิญญชนจะพึงปฏิบัติต่อทรัพย์สินของตนเองหาทในระหว่างการใช้อาคารสถานที่ปรากฏว่าอาคารสถานที่ที่ขอใช้สูญหายหรือเกิดความชำรุดเสียหาย
                        อันเนื่องมาจากการใช้งาน ผู้ได้รับอนุญาตต้องรับผิดชอบชดใช้ต่อการสูญหายหรือเสียหาย
                        และมหาวิทยาสัยมีสิทธิเรียกค่าเสียหายเพิ่ม (หากมี) ได้เต็มจำนวนความเสียหาย
                        หรือจัดการซ่อมแชมให้อยู่ในสภาพเดิม แล้วแต่กรณี
                    <div class="row justify-content-center text-center align-items-center">

                        <div class="col-auto form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault1" required>
                            <label class="form-check-label" for="flexRadioDefault1">
                                ยินดีให้มหาวิทยาลัยหักเงินประกันความเสียหาย
                            </label>
                        </div>
                        <div class="col-auto form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault2" required>
                            <label class="form-check-label" for="flexRadioDefault2">
                                ยินดีแก้ไขให้กลับสู่สภาพเดิม
                            </label>
                        </div>
                    </div>
                    </p>
                    <p>3. ผู้ได้รับอนุญาตต้องชำระค่าธรรมเนียมการใช้อาคารสถานที่และค่าประกันความเสียหาย
                        ตามที่มหาวิทยาลัยประกาศกำหนดโดยให้ชำระเงินมัดจำให้มหาวิทยาลัยภายใน 7 วันทำการ
                        หลังจากที่ได้รับหนังสือแจ้งการอนุญาตให้ใช้อาคารสถานที่
                        และชำระส่วนที่เหลือทั้งหมดก่อนวันจัดงานไม่น้อยกว่า 7 วันทำการ หากไม่ชำระตามระยะเวลา ที่กำหนด
                        มหาวิทยาลัยขอสงวนสิทธิ์ในการบอกเลิกการใช้อาคารสถานที่ และจะไม่คืนเงินมัดจำที่ได้รับชำระไว้แล้ว
                    </p>
                    <p>4. กรณีผู้ได้รับอนุญาตขอยกเลิกหรือถูกเพิกถอนการอนุญาต
                        มหาวิทยาลัยอาจคืนเงินค่าธรรมเนียมการใช้อาคารสถานที่ในส่วนของค่าสาธารณูปโภคและค่าตอบแทนเจ้าหน้าที่ให้ผู้ได้รับอนุญาตแล้วแต่กรณี
                    <p>5. กรณีทีมหาวิทยาลัยเป็นผู้ขอยกเลิกการใช้อาคารสถานที่ มหาวิทยาลัยจะคืนเงินค่าธรรมเนียม
                        การขอใช้อาคารสถานที่ในส่วนที่ได้ชำระกับมหาวิทยาลัยไว้แล้วให้กับผู้ได้รับอนุญาต</p>
                    <p>6. ผู้ได้รับอนุญาตต้องกำกับดูแลร้านประกอบอาหารไม่ให้ทิ้งเศษอาหารไว้ในมหาวิทยาลัย
                        หากมหาวิทยาลัยพบว่าร้านประกอบการทิ้งเศษอาหารไว้ ข้าพเจ้า/หน่วยงาน
                        ยินยอมให้หักเงินประกันความเสียหาย</p>
                    <p>7. กรณีมีการใช้ไฟฟ้ามากกว่าปกติ เช่น ติดตั้งระบบไฟฟ้าทางเข้างาน หรือระบบแสง สี
                        เสียงบนเวทีการแสดง เป็นต้นจะต้องชำระค่าไฟฟ้าเพิ่ม ชั่วโมงละ 1,000 บาท/ระบบ
                        หรือนำเครื่องปั่นไฟมาใช้ในการจัดงาน</p>
                    <p>8. กรณีที่ใช้เครื่องปรับอากาศ มหาวิทยาลัยจะเปิดเครื่องปรับอากาศให้เฉพาะวันที่จัดงานเท่านั้น
                        และจะเปิดให้ก่อนเริ่มงาน 1 ชั่วโมง</p>
                    <p>9. มหาวิทยาลัยอนุญาตให้เข้ามาจัดเตรียมสถานที่ล่วงหน้าก่อนการจัดงานได้ 1 วัน ตั้งแต่เวลา 08.30 -
                        16.30 น.
                        และงดเปิดเครื่องปรับอากาศ หากมหาวิทยาลัยพบว่ามีการเปิดเครื่องปรับอากาศ ข้าพเจ้า/หน่วยงาน
                        ยินดีชำระค่าไฟฟ้าตามทีมหาวิทยาลัยกำหนด
                        กรณีที่จะต้องเตรียมงานมากกว่าที่กำหนดจะต้องมีหนังสือขออนุญาตมหาวิทยาลัยและเมื่อเสร็จสิ้นการจัดงานขอให้เก็บสถานที่ให้เรียบร้อยภายในวันจัดงานนั้น
                    </p>
                    <p>10. มหาวิทยาลัยอนุญาตให้ใช้สถานที่เพื่อจัดงานเท่านั้น มิใช่สถานที่รับฝากทรัพย์สิน ดังนั้น
                        มหาวิทยาลัยจะไม่รับผิดชอบต่อทรัพย์สินที่เสียหายหรือสูญหาย</p>
                    <p>11. เมื่อปรากฏโดยชัดแจ้ง ผู้ได้รับอนุญาตกระทำผิดเงื่อนไขอย่างใดอย่างหนึ่ง
                        มหาวิทยาลัยมีอำนาจสั่งระงับการใช้สถานที่นั้นได้โดยผู้ได้รับอนุญาตไม่มีสิทธิเรียกร้องค่าเสียหายที่เกิดขึ้น
                        ทั้งนี้
                        ข้าพเจ้าทราบข้อตกลงในการใช้อาคารสถานที่ของมหาวิทยาสัยเทคโนโลยีราชมงคลสุวรรณภูมิดังกล่าวเรียบร้อยแล้ว
                        จึงได้ลงลายมือชื่อไว้เป็นสำคัญและต่างยึดถือฝ่ายละหนึ่งฉบับ</p>

                    <div class="row justify-content-center text-center align-items-center">
                        <div class="col-auto form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault1" required>
                            <label class="form-check-label" for="flexRadioDefault1">
                                ยินดีให้มหาวิทยาลัยหักเงินประกันความเสียหาย
                            </label>
                        </div>
                        <div class="col-auto form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault2" required>
                            <label class="form-check-label" for="flexRadioDefault2">
                                ยินดีแก้ไขให้กลับสู่สภาพเดิม
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ออก</button>
                <a type="button" class="btn btn-warning"
                    href="{{ url('/room/' . $room->id . '/booking') }}">ยินยอม</a>
            </div>
        </div>
    </div>
</div>
