<?php

namespace App\Services\Binance;

use App\DTOs\Binance\CandleStickDataParamsDTO;
use App\DTOs\Binance\RestAPI\KlineDTO;
use App\DTOs\Binance\RestAPI\KlinesRequestDTO;
use App\DTOs\Binance\RestConfigDTO;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class BinanceRestAPI
{
    public string $baseUrl;

    public function __construct(protected readonly RestConfigDTO $config)
    {
        $this->baseUrl = $config->baseUrl;
    }

    /**
     * @throws \App\Services\Binance\BadKlinesRequestRequest
     *
     * @returns Collection<int, KlineDTO>
     */
    public function klines(KlinesRequestDTO $dto): Collection
    {
        $url = $this->baseUrl.'/klines';
        $params = $dto->toArray();

        $response = Http::get($url, $params);

        if($response->failed()) {
            throw new BadKlinesRequestRequest($response);
        }

        return $response->collect()->map(function($item){
            return new KlineDTO([
                'openTime' => $item[0],
                'openPrice' => $item[1],
                'highPrice' => $item[2],
                'lowPrice' => $item[3],
                'closePrice' => $item[4],
                'volume' => $item[5],
                'closeTime' => $item[6],
                'quoteAssetVolume' => $item[7],
                'trades' => $item[8],
                'takerBuyBaseAssetVolume' => $item[9],
                'takerBuyQuoteAssetVolume' => $item[10],
            ]);
        });
    }
}
