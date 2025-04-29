<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class EmployeeAuthenticate  extends Middleware
{
    protected function authenticate($request, array $guards)
    {

        $this->auth->shouldUse('employee');

        parent::authenticate($request, ['employee']);
    }

    protected function redirectTo($request): ?string
    {
        if (! $request->expectsJson()) {
            return route('app.employee.login');
        }

        return null;
    }
}
