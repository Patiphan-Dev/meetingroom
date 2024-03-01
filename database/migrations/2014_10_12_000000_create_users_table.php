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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable()->comment('ชื่อผู้ใช้งาน');
            $table->string('password')->nullable()->comment('รหัสผ่าน');
            $table->string('fullname')->nullable()->comment('ชื่อ-นามสกุล');
            $table->string('phone')->nullable()->comment('เบอร์โทร');
            $table->string('housenumber')->nullable()->comment('บ้านเลขที่');
            $table->string('village')->nullable()->comment('หมู่ที่');
            $table->string('alley')->nullable()->comment('ตรอก/ซอย');
            $table->string('road')->nullable()->comment('ถนน');
            $table->string('subdistrict')->nullable()->comment('ตำบล/แขวง');
            $table->string('district')->nullable()->comment('อำเภอ/เขต');
            $table->string('province')->nullable()->comment('จังหวัด');

            $table->string('status')->default('1')->comment('สถานะ');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
