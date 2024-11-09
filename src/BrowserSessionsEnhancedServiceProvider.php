<?php

namespace Harrisonratcliffe\BrowserSessionsEnhanced;

use Illuminate\Support\ServiceProvider;

class BrowserSessionsEnhancedServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publishing the configuration file
        $this->publishes([
            __DIR__.'/../config/browser-sessions-enhanced.php' => config_path('browser-sessions-enhanced.php'),
        ]);
    }

    public function register(): void
    {
        $this->app->singleton(
            abstract: 'browser-session-enhanced',
            concrete: fn () => new BrowserSessionsEnhanced()
        );
    }
}
