<?php

namespace App\Http\Controllers;

class ApiController extends Controller
{
    public function user()
    {
        return auth('user')->user();
    }
}
