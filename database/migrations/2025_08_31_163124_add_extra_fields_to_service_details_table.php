<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_details', function (Blueprint $table) {
            
            $table->string('image_two')->nullable()->after('image'); // second image
            $table->text('personal_experience')->nullable()->after('description');
            $table->text('our_processing')->nullable()->after('personal_experience');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_details', function (Blueprint $table) {
            $table->dropColumn(['image_two', 'personal_experience', 'our_processing']);

        });
    }
};
