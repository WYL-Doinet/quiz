<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function dashboard()
    {
        return Inertia::render('Dashboard/Index');
    }
}
