<?php

namespace App\Services;

use App\Repositories\RoleRepository;
use Spatie\Permission\Models\Role;

class RoleService
{
  public function __construct(private RoleRepository $roleRespository)
  {
  }

  public function findByName(string $name): Role
  {
    return $this->roleRespository->findByName($name);
  }

  public function getIdByName(string $name): int
  {
    return $this->findByName($name)?->id;
  }
}
