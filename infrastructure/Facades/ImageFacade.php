<?php

namespace   infrastructure\Facades;

use Illuminate\Support\Facades\Facade;
use Infrastructure\Images;

class ImageFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Images::class;
    }
}
