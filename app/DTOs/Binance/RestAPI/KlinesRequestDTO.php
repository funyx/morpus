<?php

namespace App\DTOs\Binance\RestAPI;

use App\DTOs\Binance\Enum\IntervalEnum;
use App\DTOs\Casting\BackedEnumCast;
use Illuminate\Validation\Rules\Enum;
use WendellAdriel\ValidatedDTO\Casting\IntegerCast;
use WendellAdriel\ValidatedDTO\Casting\StringCast;
use WendellAdriel\ValidatedDTO\ValidatedDTO;

class KlinesRequestDTO extends ValidatedDTO
{
    public ?string $symbol;
    public ?IntervalEnum $interval;
    public ?int $startTime;
    public ?int $endTime;
    public ?int $limit;

    /**
     * Defines the validation rules for the DTO.
     */
    protected function rules(): array
    {
        return [
            'symbol'    => [
                'sometimes',
                'nullable',
                'string'
            ],
            'interval'  => [
                'sometimes',
                'nullable',
                new Enum(IntervalEnum::class)
            ],
            'startTime' => [
                'sometimes',
                'nullable',
                'integer'
            ],
            'endTime'   => [
                'sometimes',
                'nullable',
                'integer'
            ],
            'limit'     => [
                'sometimes',
                'nullable',
                'integer',
                'between:1,1000'
            ],
        ];
    }

    /**
     * Defines the default values for the properties of the DTO.
     */
    protected function defaults(): array
    {
        return [
            'symbol'    => 'BTCUSDT',
            'interval'  => '1s',
            'startTime' => null,
            'endTime'   => null,
            'limit'     => 1000,
        ];
    }

    protected function mapBeforeExport(): array
    {
        return [
            'interval' => 'interval.value',
        ];
    }

    /**
     * Defines the type casting for the properties of the DTO.
     */
    protected function casts(): array
    {
        return [
            'symbol'    => new StringCast(),
            'interval'  => new BackedEnumCast(IntervalEnum::class),
            'startTime' => new IntegerCast(),
            'endTime'   => new IntegerCast(),
            'limit'     => new IntegerCast(),
        ];
    }
}
