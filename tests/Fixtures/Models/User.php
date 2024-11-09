<?php

namespace Harrisonratcliffe\BrowserSessionsEnhanced\Tests\Fixtures\Models;

use Harrisonratcliffe\BrowserSessionsEnhanced\Tests\Fixtures\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory(): Factory
    {
        return UserFactory::new();
    }
}
