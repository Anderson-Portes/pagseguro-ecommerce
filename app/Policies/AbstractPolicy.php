<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

abstract class AbstractPolicy
{
    use HandlesAuthorization;

    public function userHasPermissions(User $user, array | string $permissions, bool $args = true): Response
    {
        $permissions = is_string($permissions) ? explode('|', $permissions) : $permissions;
        foreach ($permissions as $p)
            if (!$user->role->hasPermissionTo($p)) return Response::denyAsNotFound();
        return $user->activated && $args ? Response::allow() : Response::denyAsNotFound();
    }
}
