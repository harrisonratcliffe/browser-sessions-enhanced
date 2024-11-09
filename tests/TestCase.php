<?php

namespace Harrisonratcliffe\BrowserSessionsEnhanced\Tests;

use Harrisonratcliffe\BrowserSessionsEnhanced\BrowserSessionsEnhancedServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');

        app(abstract: 'db')->connection()->getSchemaBuilder()->create(table: 'users', callback: function ($table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // $table->rememberToken();
            $table->timestamps();
        });
    }

    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Harrisonratcliffe\\BrowserSessionsEnhanced\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app): array
    {
        return [
            BrowserSessionsEnhancedServiceProvider::class,
        ];
    }
}
