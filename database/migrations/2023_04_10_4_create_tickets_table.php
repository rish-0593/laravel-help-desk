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
        Schema::disableForeignKeyConstraints();

        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->unsignedBigInteger('ticket_category_id');
            $table->foreign('ticket_category_id')->references('id')->on('ticket_categories');
            $table->unsignedBigInteger('ticket_status_id');
            $table->foreign('ticket_status_id')->references('id')->on('ticket_status');
            $table->unsignedBigInteger('ticket_user_id');
            $table->foreign('ticket_user_id')->references('id')->on('ticket_users');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
