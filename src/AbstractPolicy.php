<?php

namespace Webfucktory\LaravelPermissions;

use Webfucktory\LaravelPermissions\Contracts\Authorizable;
use Webfucktory\LaravelPermissions\Contracts\HasPermissions;

abstract class AbstractPolicy
{
    protected static string $model;

    /**
     * @return class-string<Authorizable>
     */
    abstract protected static function getModel(): string;

    public function viewAny(HasPermissions $user): bool
    {
        return $user::hasPermission('view', static::getModel());
    }

    public function create(HasPermissions $user): bool
    {
        /**
         * @noinspection PhpRedundantVariableDocTypeInspection
         * @var class-string<Authorizable> $model
         */
        $model = static::getModel();

        return $user::hasPermission('create', $model) && $model::canBeCreated($user);
    }

    public function view(HasPermissions $user, Authorizable $model): bool
    {
        return $user::hasPermission('view', $model::class) && $model->canBeViewed($user);
    }

    public function update(HasPermissions $user, Authorizable $model): bool
    {
        return $user::hasPermission('update', $model::class) && $model->canBeUpdated($user);
    }

    public function delete(HasPermissions $user, Authorizable $model): bool
    {
        return $user::hasPermission('delete', $model::class) && $model->canBeDeleted($user);
    }

    public function restore(HasPermissions $user, Authorizable $model): bool
    {
        return $user::hasPermission('restore', $model::class) && $model->canBeRestored($user);
    }

    public function forceDelete(HasPermissions $user, Authorizable $model): bool
    {
        return $user::hasPermission('force-delete', $model::class) && $model->canBeForceDeleted($user);
    }
}
