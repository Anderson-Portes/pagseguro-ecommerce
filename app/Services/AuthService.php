<?php

namespace App\Services;

use App\Models\User;

class AuthService
{
  public function __construct(private UserService $userService)
  {
  }

  public function login(array $credentials, bool $remember): bool
  {
    return auth()->attempt($credentials + ['activated' => true], $remember);
  }

  public function register(array $data, bool $remember)
  {
    $user = $this->userService->create($data);
    $this->loginUser($user, $remember);
  }

  public function logout(): void
  {
    auth()->logout();
  }

  private function loginUser(User $user, bool $remember): void
  {
    auth()->login($user, $remember);
  }
}
