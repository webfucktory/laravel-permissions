<?php

namespace Webfucktory\LaravelPermissions\Contracts;

interface Authorizable
{
    public static function canBeCreated(HasPermissions $user): bool;

    public function canBeViewed(HasPermissions $user): bool;

    public function canBeUpdated(HasPermissions $user): bool;

    public function canBeDeleted(HasPermissions $user): bool;

    public function canBeRestored(HasPermissions $user): bool;

    public function canBeForceDeleted(HasPermissions $user): bool;
}
