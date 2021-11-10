<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __invoke()
    {
        $user = auth()->guard('admin')->user();

        return view('home', compact('user'));
    }
}
