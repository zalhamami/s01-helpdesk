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
        Schema::create('helpdesk_ticket_helpdesks', function (Blueprint $table) {
            $table->id();
            $table->string('pengecekan_link');
            $table->string('pengecekan_link2');
            $table->text('text');
            $table->string('myCheckbox');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('helpdesk_ticket_helpdesks');
    }
};
