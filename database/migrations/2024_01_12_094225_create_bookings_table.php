<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('bk_user_id')->nullable()->comment('รหัสผู้จอง');
            $table->string('bk_room_id',2)->nullable()->comment('รหัสหอประชุม');
            $table->date('bk_str_date')->nullable()->comment('วันที่เริ่ม');
            $table->date('bk_end_date')->nullable()->comment('วันที่สิ้นสุด');
            $table->time('bk_str_time')->nullable()->comment('เวลาจอง');
            $table->time('bk_end_time')->nullable()->comment('เวลาออก');
            $table->string('bk_slip')->nullable()->comment('สลิปมัดจำ');
            $table->string('bk_slip2')->nullable()->comment('สลิปส่วนที่เหลือ');
            $table->text('bk_node')->nullable()->comment('หมายเหตุ');
            $table->string('bk_status')->default('1')->comment('สถานะ (0.ไม่อนุมัติ 1.รอชำระ 2.รอตรวจสอบ 3.อนุมัติ) ');

            $table->string('bk_music_brand')->nullable()->comment('วงดนตรีครบชุดมีเพาเวอร์แอมป์ ตู้ลำโพงมาเอง');
            $table->string('bk_music_equipment')->nullable()->comment('มีเฉพาะเครื่องดนตรี');
            $table->string('bk_music_details')->nullable()->comment('กรณีเป็นแบบที่ 2');

            $table->string('bk_sound')->nullable()->comment('ระบบเสียงพร้อมไมค์โครโฟน 2 ตัว');
            $table->string('bk_sound_node')->nullable()->comment('หมายเหตุ');
            $table->string('bk_screen_big')->nullable()->comment('จอภาพขนาดใหญ่บนเวที่ 1 จอ');
            $table->string('bk_screen_big_note')->nullable()->comment('หมายเหตุ');
            $table->string('bk_tv_left')->nullable()->comment('จอภาพทีวีด้านข้างฝั่งซ้าย 4 จอ');
            $table->string('bk_tv_left_note')->nullable()->comment('หมายเหตุ');
            $table->string('bk_tv_right')->nullable()->comment('จอภาพทีวีด้านข้างฝั่งขวา 4 จอ');
            $table->string('bk_tv_right_note')->nullable()->comment('หมายเหตุ');
            $table->string('bk_table')->nullable()->comment('โต๊ะปฏิบัติการหน้าขาว 10 ตัว');
            $table->string('bk_table_note')->nullable()->comment('หมายเหตุ');

            $table->string('bk_confirm')->nullable()->comment('ยินยอมชดใช้ค่าเสียหาย');
            $table->string('bk_location_for')->nullable()->comment('ความประสงค์ขอใช้สถานที่');
            $table->string('bk_people_number')->nullable()->comment('จำนวนคน');

            $table->string('bk_list1')->nullable()->comment('ระบบเสียงพร้อมไมค์โครโฟน 2 ตัว');
            $table->string('bk_list1_note')->nullable()->comment('หมายเหตุ1');
            $table->string('bk_list2')->nullable()->comment('จอภาพขนาดใหญ่บนเวที่ 1 จอ');
            $table->string('bk_list2_note')->nullable()->comment('หมายเหตุ2');
            $table->string('bk_list3')->nullable()->comment('จอภาพทีวีด้านข้างฝั่งซ้าย 4 จอ');
            $table->string('bk_list3_note')->nullable()->comment('หมายเหตุ3');
            $table->string('bk_list4')->nullable()->comment('จอภาพทีวีด้านข้างฝั่งขวา 4 จอ');
            $table->string('bk_list4_note')->nullable()->comment('หมายเหตุ4');
            $table->string('bk_list5')->nullable()->comment('โต๊ะปฏิบัติการหน้าขาว 10 ตัว');
            $table->string('bk_list5_note')->nullable()->comment('หมายเหตุ5');

            // $table->double('maintenance', 7)->default(0)->comment('ค่าบำรุงสถานที่');
            // $table->double('utilities', 7)->default(0)->comment('ค่าสารณูปโภค');
            // $table->double('officer_compensation', 7)->default(0)->comment('ค่าตอบแทนเจ้าหน้าที่');
            // $table->double('other_expenses', 7)->default(0)->comment('ค่าใช้จ่ายอื่นๆ');
            // $table->double('total', 7)->default(0)->comment('ค่าใช้จ่ายรวม');
            // $table->double('damage_insurance', 7)->default(0)->comment('ค่าประกันความเสียหาย');

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
