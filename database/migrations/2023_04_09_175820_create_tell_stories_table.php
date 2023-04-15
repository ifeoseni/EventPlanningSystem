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
        Schema::create('tell_stories', function (Blueprint $table) {
            $table->id();
            $table->string('storytitle');
            $table->string('storydescription');
            $table->string('whereithappened');
            $table->Integer('estimatedattendees');
            $table->string('dateithappened');
            $table->string('images');
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
        Schema::dropIfExists('tell_stories');
    }
};
