<?php

namespace App\DTOs\Casting;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Throwable;
use WendellAdriel\ValidatedDTO\Casting\Castable;
use WendellAdriel\ValidatedDTO\Exceptions\CastException;

class CarbonImmutableTimestampMs implements Castable
{

    /**
     * @throws \WendellAdriel\ValidatedDTO\Exceptions\CastException
     */
    public function cast( string $property, mixed $value ): CarbonImmutable
    {
        try {
            return Carbon::createFromTimestampMsUTC($value)->toImmutable();
        } catch (Throwable) {
            throw new CastException($property);
        }
    }
}
