<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('portfolio_details', function (Blueprint $table) {
            $table->json('extra_images')->nullable()->after('image'); 
        });
    }

    public function down()
    {
        Schema::table('portfolio_details', function (Blueprint $table) {
            $table->dropColumn('extra_images');
        });
    }
};
