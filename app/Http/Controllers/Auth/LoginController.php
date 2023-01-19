<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Inertia\Response;
use Inertia\ResponseFactory;

class LoginController extends Controller
{
    public function __construct(private AuthService $authService)
    {
    }

    public function index(): ResponseFactory | Response
    {
        return inertia('Auth/Login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $data = $request->validated();
        if (!$this->authService->login($data, $request->remember ?? false)) {
            throw ValidationException::withMessages([
                'password' => 'Essas credenciais não foram encontradas em nossos registros.'
            ]);
        }
        return redirect()->route('home');
    }
}
