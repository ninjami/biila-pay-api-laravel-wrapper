<?php

namespace BiilaPay\LaravelApiWrapper\Exceptions;

use RuntimeException;

class InvalidClientCredentialsException extends RuntimeException
{
    public static function idMissing(): self
    {
        return new static("Client id missing in config for Biila Pay API.");
    }

    public static function tokenMissing(): self
    {
        return new static("Client token missing in config for Biila Pay API.");
    }
}