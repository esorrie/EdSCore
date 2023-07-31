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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('name');
            $table->string('crest');
            $table->string('founded')->nullable();
            $table->string('stadium');
            $table->string('location');
            $table->string('manager');
            // $table->string('capacity');
            // $table->float('lat');
            // $table->float('lng');
            // $table->float('played');
            // $table->float('won');
            // $table->float('drawn');
            // $table->float('lost');
            $table->foreignId('league_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
