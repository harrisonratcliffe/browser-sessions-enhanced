<?php

namespace Harrisonratcliffe\BrowserSessionsEnhanced\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Illuminate\Support\Collection sessions()
 * @method static void logoutOtherBrowserSessions()
 * @method static \Illuminate\Support\Carbon|string getUserLastActivity(bool $human = false)
 */
class BrowserSessionsEnhanced extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'browser-sessions-enhanced';
    }
}
