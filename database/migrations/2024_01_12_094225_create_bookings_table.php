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
            $table->string('bk_room_id',2)->nullable()->comment('รหัสหอประชุม');
            $table->string('bk_user_id')->nullable()->comment('รหัสผู้จอง');
            $table->date('bk_str_date')->nullable()->comment('วันที่เริ่ม');
            $table->date('bk_end_date')->nullable()->comment('วันที่สิ้นสุด');
            $table->time('bk_str_time')->comment('เวลาจอง');
            $table->time('bk_end_time')->comment('เวลาออก');
            $table->integer('bk_sumtime')->comment('เวลาเช่า (นาที)');
            $table->string('bk_slip')->nullable()->comment('สลิป');

            $table->double('maintenance', 7)->default(0)->comment('ค่าบำรุงสถานที่');
            $table->double('utilities', 7)->default(0)->comment('ค่าสารณูปโภค');
            $table->double('officer_compensation', 7)->default(0)->comment('ค่าตอบแทนเจ้าหน้าที่');
            $table->double('other_expenses', 7)->default(0)->comment('ค่าใช้จ่ายอื่นๆ');
            $table->double('total', 7)->default(0)->comment('ค่าใช้จ่ายรวม');
            $table->double('damage_insurance', 7)->default(0)->comment('ค่าประกันความเสียหาย');

            $table->text('bk_node')->nullable()->comment('หมายเหตุ');
            $table->string('bk_status')->default('1')->comment('สถานะ (0.ไม่อนุมัติ 1.รอชำระ 2.รอตรวจสอบ 3.อนุมัติ) ');
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
