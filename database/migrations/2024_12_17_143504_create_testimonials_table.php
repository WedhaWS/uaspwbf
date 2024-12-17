<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonialsTable extends Migration
{
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id('testimonial_id');
            $table->unsignedBigInteger('customer_id');
            $table->integer('rating')->check('rating >= 1 and rating <= 5');
            $table->text('comment')->nullable();
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('testimonials');
    }
}