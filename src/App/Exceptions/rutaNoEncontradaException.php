<?php

namespace App\Exceptions;

class rutaNoEncontradaException extends \Exception
{

    public function __construct(string $message = "Ruta no encontrada", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }


}