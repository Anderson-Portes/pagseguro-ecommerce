<?php

namespace App\Repositories;

use Spatie\Permission\Models\Role;

class RoleRepository
{
  public function findByName(string $name): Role
  {
    return Role::firstWhere('name', $name);
  }
}
