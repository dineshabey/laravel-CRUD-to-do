<?php

namespace domain\Facades;

use Illuminate\Support\Facades\Facade;

class TodoFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return TodoServices::class;
    }
}
