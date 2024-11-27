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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->foreignId('team_id');
            $table->string('name')->nullable();
            $table->string('position')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('country')->nullable();
            $table->string('number')->nullable();
            $table->string('Played')->nullable();
            $table->string('Started')->nullable();
            $table->string('Minutes')->nullable();
            $table->string('goals')->nullable();
            $table->string('assists')->nullable();
            $table->string('own_goals')->nullable();
            $table->string('penalties')->nullable();
            $table->string('subbed_in')->nullable();
            $table->string('subbed_out')->nullable();
            $table->string('yellows')->nullable();
            $table->string('yellow_red')->nullable();
            $table->string('red')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
