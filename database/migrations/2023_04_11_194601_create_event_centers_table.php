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
        Schema::create('event_centers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description');
            $table->string('location');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('state');
            $table->string('lga');
            $table->string('eventcenterslug')->unique();
            $table->string('country');
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
        Schema::dropIfExists('event_centers');
    }
};
