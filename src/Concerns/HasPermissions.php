<?php

namespace Webfucktory\LaravelPermissions\Concerns;

use Illuminate\Support\Arr;
use Webfucktory\LaravelPermissions\Contracts\Authorizable;
use Webfucktory\LaravelPermissions\Enums\Permission;

trait HasPermissions
{
    /**
     * @var array<class-string,Permission|array<Permission>>|string
     */
    protected static array|string $permissions = [];

    public static function hasPermission(Permission $permission, string $model): bool
    {
        if (static::$permissions === '*') {
            return true;
        }

        if (!array_key_exists($model, Arr::wrap(static::$permissions))) {
            return false;
        }

        if (static::$permissions[$model] === '*') {
            return true;
        }

        return in_array($permission, Arr::wrap(static::$permissions[$model]));
    }

    public static function canCreate(string $authorizable): bool
    {
        return true;
    }

    public function canView(Authorizable $authorizable): bool
    {
        return true;
    }

    public function canUpdate(Authorizable $authorizable): bool
    {
        return true;
    }

    public function canDelete(Authorizable $authorizable): bool
    {
        return true;
    }

    public function canRestore(Authorizable $authorizable): bool
    {
        return true;
    }

    public function canForceDelete(Authorizable $authorizable): bool
    {
        return true;
    }
}
