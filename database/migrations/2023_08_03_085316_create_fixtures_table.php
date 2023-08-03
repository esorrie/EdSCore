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
        Schema::create('fixtures', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('home_team_id');
            $table->string('away_team_id');
            $table->string('home_team_slug');
            $table->string('away_team_slug');
            $table->string('home_team');
            $table->string('away_team');
            $table->string('half_time_home')->nullable();
            $table->string('half_time_away')->nullable();
            $table->string('full_time_home')->nullable();
            $table->string('full_time_away')->nullable();
            $table->string('referee')->nullable();
            $table->foreignId('league_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fixtures');
    }
};
