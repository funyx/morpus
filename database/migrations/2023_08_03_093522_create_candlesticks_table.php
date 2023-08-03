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
        Schema::create('candlesticks', static function (Blueprint $table) {
            $table->id();
            $table->dateTimeTz('openTime');
            $table->dateTimeTz('closeTime');
            $table->unsignedFloat('openPrice', 16, 8);
            $table->unsignedFloat('highPrice', 16, 8);
            $table->unsignedFloat('lowPrice', 16, 8);
            $table->unsignedFloat('closePrice', 16, 8);
            $table->unsignedFloat('volume', 16, 8);
            $table->unsignedFloat('quoteAssetVolume', 16, 8);
            $table->integer('trades');
            $table->unsignedFloat('takerBuyBaseAssetVolume', 16, 8);
            $table->unsignedFloat('takerBuyQuoteAssetVolume', 16, 8);
            $table->timestamps();
            $table->unique(['openTime', 'closeTime'], 'openCloseTime');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candlesticks');
    }
};
