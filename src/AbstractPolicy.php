<?php

namespace Webfucktory\LaravelPermissions;

use Webfucktory\LaravelPermissions\Contracts\Authorizable;
use Webfucktory\LaravelPermissions\Contracts\HasPermissions;
use Webfucktory\LaravelPermissions\Enums\Permission;

abstract class AbstractPolicy
{
    protected static string $model;

    /**
     * @return class-string<Authorizable>
     */
    abstract protected static function getModel(): string;

    public function viewAny(HasPermissions $user): bool
    {
        return $user::hasPermission(Permission::view, static::getModel());
    }

    public function create(HasPermissions $user): bool
    {
        /**
         * @noinspection PhpRedundantVariableDocTypeInspection
         * @var class-string<Authorizable> $model
         */
        $model = static::getModel();

        return $user::hasPermission(Permission::create, $model) && $model::canBeCreated($user);
    }

    public function view(HasPermissions $user, Authorizable $model): bool
    {
        return $user::hasPermission(Permission::view, $model::class) && $model->canBeViewed($user);
    }

    public function update(HasPermissions $user, Authorizable $model): bool
    {
        return $user::hasPermission(Permission::update, $model::class) && $model->canBeUpdated($user);
    }

    public function delete(HasPermissions $user, Authorizable $model): bool
    {
        return $user::hasPermission(Permission::delete, $model::class) && $model->canBeDeleted($user);
    }

    public function restore(HasPermissions $user, Authorizable $model): bool
    {
        return $user::hasPermission(Permission::restore, $model::class) && $model->canBeRestored($user);
    }

    public function forceDelete(HasPermissions $user, Authorizable $model): bool
    {
        return $user::hasPermission(Permission::force_delete, $model::class) && $model->canBeForceDeleted($user);
    }
}
