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
        Schema::create('managers', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('name')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('contract_start')->nullable();
            $table->string('contract_end')->nullable();
            $table->string('country')->nullable();
            $table->foreignId('team_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('managers');
    }
};
