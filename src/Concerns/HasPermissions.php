<?php

namespace Webfucktory\LaravelPermissions\Concerns;

use Webfucktory\LaravelPermissions\Contracts\Authorizable;

/**
 * @implements \Webfucktory\LaravelPermissions\Contracts\HasPermissions
 */
trait HasPermissions
{
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
