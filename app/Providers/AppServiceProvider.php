<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Auth facade import kia gaya

class RouteServiceProvider extends ServiceProvider
{

    public function authenticated(Request $request, $user)
    {
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.home');
        } elseif ($user->hasRole('student')) {
            return redirect()->route('student.home');
        } elseif ($user->hasRole('teacher')) {
            return redirect()->route('teacher.home');
        } else {
            return redirect()->route('dashboard')->with('error', 'You do not have a role assigned.'); // ڈیفالٹ ری ڈائریکشن اور ایرر میسج
        }
    }

    public function boot(): void
    {
        // ... باقی کوڈ ...
    }
}