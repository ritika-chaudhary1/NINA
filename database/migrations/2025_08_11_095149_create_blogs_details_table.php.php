<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('blogs_details', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description'); // full content
            $table->string('image')->nullable();
            $table->json('categories')->nullable(); // store categories as JSON array
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('blogs_details');
    }
}
