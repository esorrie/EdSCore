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
            $table->foreignId('league_id');
            $table->string('date')->nullable();
            $table->string('match_id')->nullable();
            $table->string('home_team_id')->nullable();
            $table->string('away_team_id')->nullable();
            $table->string('home_team_slug')->nullable();
            $table->string('away_team_slug')->nullable();
            $table->string('home_team')->nullable();
            $table->string('away_team')->nullable();
            $table->string('home_team_crest')->nullable();
            $table->string('away_team_crest')->nullable();
            $table->string('half_time_home')->nullable();
            $table->string('half_time_away')->nullable();
            $table->string('full_time_home')->nullable();
            $table->string('full_time_away')->nullable();
            $table->string('referee')->nullable();
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
