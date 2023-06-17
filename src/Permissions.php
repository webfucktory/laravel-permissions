<?php

namespace Webfucktory\LaravelPermissions;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Webfucktory\LaravelPermissions\Contracts\HasPermissions;

class Permissions
{
    protected static array $permissions = [
        'view',
        'create',
        'update',
        'delete',
        'restore',
        'force-delete',
    ];

    public static function permissions(): array
    {
        return static::$permissions;
    }

    public static function registerPermissions(array $models): void
    {
        foreach (static::permissions() as $permission) {
            foreach ($models as $model) {
                Gate::define(
                    "$permission:$model",
                    fn(HasPermissions $user) => $user::hasPermission($permission, $model)
                );
            }
        }
    }

    public static function registerPolicies(array $policies): void
    {
        foreach ($policies as $model => $policy) {
            Gate::policy($model, $policy);
        }
    }
}
