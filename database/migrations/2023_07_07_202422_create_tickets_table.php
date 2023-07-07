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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('technician_id')->nullable()->constrained('users');
            $table->foreignId('helpdesk_id')->nullable()->constrained('users');
            $table->enum('status', ['open', 'pending', 'closed'])->default('open');
            $table->text('description');
            $table->text('problem_analysis')->nullable();
            $table->text('solution')->nullable();
            $table->string('check_link_1')->nullable();
            $table->string('check_link_2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
