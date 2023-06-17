<?php

namespace Webfucktory\LaravelPermissions\Contracts;

interface HasPermissions
{
    public static function hasPermission(string $permission, string $model): bool;

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
