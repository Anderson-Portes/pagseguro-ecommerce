<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    public function __construct(private AuthService $authService)
    {
    }

    public function index(): void
    {
    }

    public function store(CreateUserRequest $request): RedirectResponse
    {
        $this->authService->register($request->validated(), $request->remember ?? false);
        return redirect()->route('home');
    }
}
