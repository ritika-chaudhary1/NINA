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
        Schema::create('service_details', function (Blueprint $table) {
          $table->id();
          $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
          $table->string('heading');
          $table->text('content');
          $table->string('image')->nullable();
          $table->integer('order')->default(0);
          $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
