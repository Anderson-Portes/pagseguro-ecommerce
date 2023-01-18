<?php

namespace App\Services;

class AuthService
{
  public function __construct(private UserService $userService)
  {
  }

  public function login(array $credentials, bool $remember): bool
  {
    return auth()->attempt($credentials, $remember);
  }

  public function register(array $data, bool $remember)
  {
    $user = $this->userService->create($data);
    auth()->login($user, $remember);
  }

  public function logout(): void
  {
    auth()->logout();
  }
}
