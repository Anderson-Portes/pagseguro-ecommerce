<?php

namespace App\Http\Controllers;

use Inertia\Response;
use Inertia\ResponseFactory;

class HomeController extends Controller
{
    public function __invoke(): ResponseFactory | Response
    {
        return inertia('Index');
    }
}
