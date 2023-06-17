<?php

namespace Webfucktory\LaravelPermissions\Enums;

enum Permission: string
{
    case view = 'view';
    case create = 'create';
    case update = 'update';
    case delete = 'delete';
    case restore = 'restore';
    case force_delete = 'force-delete';
}
