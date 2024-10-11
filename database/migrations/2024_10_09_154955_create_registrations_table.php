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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('nid')->unique();
            $table->string('name');
            $table->string('email');
            $table->foreignId('vaccine_center_id')->constrained()->onDelete('cascade');
            $table->date('scheduled_date')->nullable();
            $table->enum('status', ['Not scheduled', 'Scheduled', 'Vaccinated'])->default('Not scheduled');
            $table->timestamps();

            $table->index(['nid', 'vaccine_center_id', 'scheduled_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
