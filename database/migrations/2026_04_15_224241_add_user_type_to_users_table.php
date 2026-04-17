<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * **/
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // سنضيف العمود هنا
            $table->unsignedBigInteger('user_type_id')->nullable()->after('id');
            
            // إذا كان جدول user_types موجوداً، فك تشفير السطر التالي للربط:
            $table->foreign('user_type_id')->references('id')->on('user_types');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_type_id');
        });
    }
};
