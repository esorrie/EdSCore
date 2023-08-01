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
        Schema::create('standings', function (Blueprint $table) {
            $table->foreignId('league_id');
            $table->foreignId('team_id');
            $table->float('won')->nullable();
            $table->float('drawn')->nullable();
            $table->float('lost')->nullable();
            $table->float('gf')->nullable();
            $table->float('ga')->nullable();
            $table->float('gd')->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('standings');
    }
};
