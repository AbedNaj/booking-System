<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EmployeeUnauthenticated
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('employee')->check()) {
            return redirect()->route('app.employee.dashboard');
        }

        return $next($request);
    }
}
