<?php

namespace Webfucktory\LaravelPermissions;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;
use Webfucktory\LaravelPermissions\Contracts\HasPermissions;
use Webfucktory\LaravelPermissions\Enums\Permission;

class Permissions
{
    private static array $permissions = [];

    public static function setPermissions(string $hasPermissions, string|array $permissions): void
    {
        static::$permissions[$hasPermissions] = $permissions;
    }

    public static function getPermissions(string $hasPermissions): string|array|null
    {
        return Arr::get(static::$permissions, $hasPermissions);
    }

    public static function registerPermissions(array $models): void
    {
        foreach (Permission::cases() as $permission) {
            foreach ($models as $model) {
                Gate::define(
                    "$permission->value:$model",
                    fn(HasPermissions $user) => static::authorize($user, $permission, $model)
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

    public static function authorize(HasPermissions $user, Permission $permission, string $model): bool
    {
        $permissions = static::getPermissions($user::class);

        if (!$permissions) {
            return false;
        }

        if ($permissions === '*') {
            return true;
        }

        $modelPermissions = Arr::get($permissions, $model);

        if (!$modelPermissions) {
            return false;
        }

        if ($modelPermissions === '*') {
            return true;
        }

        return in_array($permission, $modelPermissions);
    }
}
