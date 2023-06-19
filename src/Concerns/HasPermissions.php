<?php

namespace Webfucktory\LaravelPermissions\Concerns;

use Webfucktory\LaravelPermissions\Contracts\Authorizable;
use Webfucktory\LaravelPermissions\Enums\Permission;

trait HasPermissions
{
    /**
     * @var array<class-string,Permission|array<Permission>>|string
     */
    protected static array|string $permissions = [];

    public static function getPermissions(string $model): array|string
    {
        if (static::$permissions === '*') {
            return static::$permissions;
        }

        return static::$permissions[$model];
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
