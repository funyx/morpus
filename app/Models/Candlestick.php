<?php

namespace App\Models;

use App\DTOs\Binance\RestAPI\KlineDTO;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Candlestick extends Model
{
    use HasFactory;

    public static mixed $unique = [
        'openTime',
        'closeTime',
    ];
    public static mixed $updatable = [
        'openTime',
        'closeTime',
        'openPrice',
        'highPrice',
        'lowPrice',
        'closePrice',
        'volume',
        'quoteAssetVolume',
        'trades',
        'takerBuyBaseAssetVolume',
        'takerBuyQuoteAssetVolume',
    ];
    protected $fillable = [
        'openTime',
        'closeTime',
        'openPrice',
        'highPrice',
        'lowPrice',
        'closePrice',
        'volume',
        'quoteAssetVolume',
        'trades',
        'takerBuyBaseAssetVolume',
        'takerBuyQuoteAssetVolume',
    ];

    /**
     * @param Collection<int, KlineDTO> $klines
     */
    public static function upsertDTOCollection( Collection $klines ): int
    {
        return self::query()
                   ->upsert($klines->map(fn($i) => $i->toArray())->toArray(), self::$unique, self::$updatable);
    }
}
