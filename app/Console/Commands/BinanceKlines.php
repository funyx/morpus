<?php

namespace App\Console\Commands;

use App\DTOs\Binance\RestAPI\KlinesRequestDTO;
use App\Models\Candlestick;
use App\Services\Binance\BinanceRestAPI;
use Illuminate\Console\Command;

class BinanceKlines extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'binance:klines          { --symbol= : single symbol ( Default BTCUSD ) }
                                                    { --interval= : interval ( Default 1s ) }
                                                    { --startTime= : The start time ( Default now ) }
                                                    { --endTime= : The end time ( Default null ) }
                                                    { --limit= : The limit ( Default 1000 ) }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct(private readonly BinanceRestAPI $binance)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @throws \App\Services\Binance\BadKlinesRequestRequest
     * @throws \Illuminate\Validation\ValidationException
     * @throws \WendellAdriel\ValidatedDTO\Exceptions\CastTargetException
     * @throws \WendellAdriel\ValidatedDTO\Exceptions\MissingCastTypeException
     */
    public function handle(): void
    {
        $klines = $this->binance->klines(KlinesRequestDTO::fromCommandOptions($this));
        $this->info(sprintf('Loaded %d klines', $klines->count()));
        $stored = Candlestick::upsertDTOCollection($klines);
        $this->info(sprintf('Stored %d klines', $stored));
    }
}
