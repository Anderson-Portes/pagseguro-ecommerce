<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __construct(private AuthService $authService)
    {
    }

    public function __invoke(): RedirectResponse
    {
        $this->authService->logout();
        return redirect()->route('login');
    }
}
