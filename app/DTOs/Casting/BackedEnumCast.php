<?php

namespace App\DTOs\Casting;

use BackedEnum;
use Throwable;
use WendellAdriel\ValidatedDTO\Casting\Castable;
use WendellAdriel\ValidatedDTO\Exceptions\CastException;

class BackedEnumCast implements Castable
{
    public function __construct(
        private readonly string $type
    ) {
    }

    /**
     * @throws \App\DTOs\Casting\Exceptions\MissingCastEnum
     * @throws \WendellAdriel\ValidatedDTO\Exceptions\CastException
     */
    public function cast( string $property, mixed $value ): BackedEnum
    {
        if(!enum_exists($this->type)) {
            throw new Exceptions\MissingCastEnum($this->type);
        }

        try {
            if($value instanceof $this->type) {
                return $value;
            }

            if(
                is_string($value) || is_int($value)
            ){
                /** @noinspection PhpUndefinedMethodInspection */
                return $this->type::from($value);
            }

            throw new CastException($property);
        } catch (Throwable) {
            throw new CastException($property);
        }
    }
}
