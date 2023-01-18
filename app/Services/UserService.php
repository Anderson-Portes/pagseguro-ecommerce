<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class UserService
{
  public function __construct(private UserRepository $userRepository)
  {
  }

  public function create(array $data): User
  {
    $data['password'] = bcrypt($data['password']);
    return $this->userRepository->create($data);
  }
}
