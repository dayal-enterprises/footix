<?php

use App\Enums\GameStatusEnum;
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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('place')->nullable();
            $table->enum('status', [
                GameStatusEnum::EN_COURS->value,
                GameStatusEnum::TERMINE->value,
                GameStatusEnum::A_VENIR->value,
                GameStatusEnum::REPORTE->value,
                GameStatusEnum::ANNULE->value,
            ])->nullable();
            $table->string('referee')->nullable();
            $table->string('competition')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
