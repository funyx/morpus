<?php

namespace App\DTOs\Casting\Exceptions;

use RuntimeException;

class MissingCastEnum extends RuntimeException
{

    public function __construct( $type = "", $code = 0, $previous = null ) {
        parent::__construct("Missing enum type: {$type}", $code, $previous);
    }
}
