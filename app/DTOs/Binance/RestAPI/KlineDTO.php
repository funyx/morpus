<?php

namespace App\DTOs\Binance\RestAPI;

use App\DTOs\Casting\CarbonImmutableTimestampMs;
use DateTimeImmutable;
use WendellAdriel\ValidatedDTO\Casting\FloatCast;
use WendellAdriel\ValidatedDTO\Casting\IntegerCast;
use WendellAdriel\ValidatedDTO\ValidatedDTO;

class KlineDTO extends ValidatedDTO
{
    public DateTimeImmutable $openTime;
    public float $openPrice;
    public float $highPrice;
    public float $lowPrice;
    public float $closePrice;
    public float $volume;
    public DateTimeImmutable $closeTime;
    public float $quoteAssetVolume;
    public int $trades;
    public float $takerBuyBaseAssetVolume;
    public float $takerBuyQuoteAssetVolume;
    /**
     * Defines the validation rules for the DTO.
     */
    protected function rules(): array
    {
        return [
            'openTime' => ['date_format:U'],
            'openPrice' => ['numeric'],
            'highPrice' => ['numeric'],
            'lowPrice' => ['numeric'],
            'closePrice' => ['numeric'],
            'volume' => ['numeric'],
            'closeTime' => ['date_format:U'],
            'quoteAssetVolume' => ['numeric'],
            'trades' => ['numeric'],
            'takerBuyBaseAssetVolume' => ['numeric'],
            'takerBuyQuoteAssetVolume' => ['numeric'],
        ];
    }

    /**
     * Defines the default values for the properties of the DTO.
     */
    protected function defaults(): array
    {
        return [];
    }

    /**
     * Defines the type casting for the properties of the DTO.
     */
    protected function casts(): array
    {
        return [
            'openTime' => new CarbonImmutableTimestampMs(),
            'closeTime' => new CarbonImmutableTimestampMs(),
            'openPrice' => new FloatCast(),
            'highPrice' => new FloatCast(),
            'lowPrice' => new FloatCast(),
            'closePrice' => new FloatCast(),
            'volume' => new FloatCast(),
            'quoteAssetVolume' => new FloatCast(),
            'trades' => new IntegerCast(),
            'takerBuyBaseAssetVolume' => new FloatCast(),
            'takerBuyQuoteAssetVolume' => new FloatCast(),
        ];
    }

    /**
     * Maps the DTO properties before the DTO instantiation.
     */
    protected function mapBeforeValidation(): array
    {
        return [];
    }

    /**
     * Maps the DTO properties before the DTO export.
     */
    protected function mapBeforeExport(): array
    {
        return [
            'openTime' => 'openTime.date',
            'closeTime' => 'closeTime.date',
        ];
    }

    /**
     * Defines the custom messages for validator errors.
     */
    public function messages(): array
    {
        return [];
    }

    /**
     * Defines the custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [];
    }
}
