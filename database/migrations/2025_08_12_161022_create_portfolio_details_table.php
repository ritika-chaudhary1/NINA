<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfolioDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('portfolio_details', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();  // add description for your detailed text
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('portfolio_details');
    }
}
