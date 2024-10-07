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
        Schema::create('chate_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('send_id');
            $table->unsignedBigInteger('receiver_id');
            $table->text('message'); 
            
            $table->foreign('send_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('receiver_id')->references('id')->on('users')->onDelete('restrict');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chate_messages');
    }
};
