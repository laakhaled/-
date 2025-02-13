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
        Schema::table('authors', function (Blueprint $table) {
            $table->string('profile_image')->nullable()->change(); // جعل الحقل إجباريًا
        });
    }

    public function down()
    {
        Schema::table('authors', function (Blueprint $table) {
            $table->string('profile_image')->nullable()->change(); // التراجع إلى nullable
        });
    }
};
