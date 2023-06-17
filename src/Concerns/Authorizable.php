<?php

namespace Webfucktory\LaravelPermissions\Concerns;

use Webfucktory\LaravelPermissions\Contracts\HasPermissions;

trait Authorizable
{
    public static function canBeCreated(HasPermissions $user): bool
    {
        return true;
    }

    public function canBeViewed(HasPermissions $user): bool
    {
        return true;
    }

    public function canBeUpdated(HasPermissions $user): bool
    {
        return true;
    }

    public function canBeDeleted(HasPermissions $user): bool
    {
        return true;
    }

    public function canBeRestored(HasPermissions $user): bool
    {
        return true;
    }

    public function canBeForceDeleted(HasPermissions $user): bool
    {
        return true;
    }
}
