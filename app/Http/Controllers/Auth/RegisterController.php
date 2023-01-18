<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;
use Inertia\ResponseFactory;

class RegisterController extends Controller
{
    public function __construct(private AuthService $authService)
    {
    }

    public function index(): Response | ResponseFactory
    {
        return inertia('Auth/Register');
    }

    public function store(CreateUserRequest $request): RedirectResponse
    {
        $this->authService->register($request->validated(), $request->remember ?? false);
        return redirect()->route('home');
    }
}
