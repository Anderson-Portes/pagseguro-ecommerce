<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class UserService
{
  public function __construct(private UserRepository $userRepository, private AddressService $addressService, private RoleService $roleService)
  {
  }

  public function create(array $data): User
  {
    $data['password'] = bcrypt($data['password']);
    $data['address_id'] = $this->addressService->createAndGetId($data);
    $data['role_id'] = $this->roleService->getIdByName('user');
    return $this->userRepository->create($data);
  }
}
