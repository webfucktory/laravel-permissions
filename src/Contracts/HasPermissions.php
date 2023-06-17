<?php

namespace Webfucktory\LaravelPermissions\Contracts;

use Webfucktory\LaravelPermissions\Enums\Permission;

interface HasPermissions
{
    public static function hasPermission(Permission $permission, string $model): bool;

    /**
     * @param class-string<Authorizable> $authorizable
     * @return bool
     */
    public static function canCreate(string $authorizable): bool;

    public function canView(Authorizable $authorizable): bool;

    public function canUpdate(Authorizable $authorizable): bool;

    public function canDelete(Authorizable $authorizable): bool;

    public function canRestore(Authorizable $authorizable): bool;

    public function canForceDelete(Authorizable $authorizable): bool;
}
