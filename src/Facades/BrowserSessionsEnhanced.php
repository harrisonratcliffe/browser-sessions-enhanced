<?php

namespace Harrisonratcliffe\BrowserSessionsEnhanced\Facades;

use Illuminate\Support\Facades\Facade;

class BrowserSessionsEnhanced extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'browser-sessions-enhanced';
    }
}
