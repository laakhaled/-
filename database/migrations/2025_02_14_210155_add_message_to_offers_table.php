<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
    public function up()
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->text('message')->after('service_request_id'); // إضافة عمود message
        });
    }

    public function down()
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->dropColumn('message');
        });
    }
};
