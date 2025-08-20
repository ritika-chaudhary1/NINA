<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('portfolio_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('portfolio_category_id'); // Link to portfolio category
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('client')->nullable();       // New client field
            $table->string('location')->nullable();     // New location field
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('portfolio_category_id')
                  ->references('id')
                  ->on('portfolio_categories')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('portfolio_details');
    }
};
