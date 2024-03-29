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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_name')->nullable()->comment('ชื่อหอประชุม');
            $table->text('room_details')->nullable()->comment('รายละเอียดหอประชุม');
            $table->text('room_img_path')->nullable()->comment('รูปภาพ');
            $table->text('room_diagram_path')->nullable()->comment('แผนภาพ');
            $table->double('maintenance', 7)->default(0)->comment('ค่าบำรุงสถานที่');
            $table->double('utilities', 7)->default(0)->comment('ค่าสารณูปโภค');
            $table->double('officer_compensation', 7)->default(0)->comment('ค่าตอบแทนเจ้าหน้าที่');
            $table->double('other_expenses', 7)->default(0)->comment('ค่าใช้จ่ายอื่นๆ');
            $table->double('total', 7)->default(0)->comment('ค่าใช้จ่ายรวม');
            $table->double('damage_insurance', 7)->default(0)->comment('ค่าประกันความเสียหาย');
            $table->string('room_status')->default('1')->comment('สถานะหอประชุม');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
