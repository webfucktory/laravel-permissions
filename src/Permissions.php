<?php

namespace Webfucktory\LaravelPermissions;

use Illuminate\Support\Facades\Gate;
use Webfucktory\LaravelPermissions\Contracts\HasPermissions;
use Webfucktory\LaravelPermissions\Enums\Permission;

class Permissions
{
    public static function registerPermissions(array $models): void
    {
        foreach (Permission::cases() as $permission) {
            foreach ($models as $model) {
                Gate::define(
                    "$permission->value:$model",
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
