<?php

namespace Agungsp\FilamentCleaveInput\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Agungsp\FilamentCleaveInput\FilamentCleaveInput
 */
class FilamentCleaveInput extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Agungsp\FilamentCleaveInput\FilamentCleaveInput::class;
    }
}
