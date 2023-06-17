<?php

namespace Webfucktory\LaravelPermissions\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Webfucktory\LaravelPermissions\ServiceProvider;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class,
        ];
    }
}
