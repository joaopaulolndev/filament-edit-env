<?php

namespace Joaopaulolndev\FilamentEditEnv\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Joaopaulolndev\FilamentEditEnv\FilamentEditEnv
 */
class FilamentEditEnv extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Joaopaulolndev\FilamentEditEnv\FilamentEditEnv::class;
    }
}
