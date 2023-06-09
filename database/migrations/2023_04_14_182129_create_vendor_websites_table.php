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
        Schema::create('vendor_websites', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->string('businessage');
            $table->string('state');
            $table->string('country');
            $table->string('aboutus');
            $table->string('phone_number');
            $table->string('email');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('linkedin');
            $table->string('images');
            $table->string('logo');
            $table->string('color');
            $table->string('vendortype');
            $table->unsignedBigInteger('addedby');
            $table->foreign('addedby')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_websites');
    }
};
