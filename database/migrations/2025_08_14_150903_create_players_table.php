<?php

use App\Models\Team;
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
            $table->foreignIdFor(Team::class);
            $table->string('full_name');
            $table->integer('age');
            $table->integer('bib')->default(0);
            $table->unsignedSmallInteger('height')->default(1);
            $table->unsignedSmallInteger('weight')->default(50);
            $table->string('position')->nullable();
            $table->unsignedSmallInteger('speed')->default(10);
            $table->string('image')->nullable();
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
