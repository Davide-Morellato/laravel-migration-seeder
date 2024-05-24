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
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->string('company', 30);
            $table->string('departure_trains_station', 100);
            $table->string('arrival_trains_station', 100);
            $table->dateTime('departure_time', $precision=0);
            $table->dateTime('arrival_time', $precision=0);
            $table->mediumInteger('train_code');
            $table->tinyInteger('coaches_numbers');
            $table->boolean('on_time');
            $table->string('deleted', 5)->nullable();
            $table->timestamps(); //data attuale
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trains');
    }
};
