<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class CustomerAuthenticate extends Middleware
{
    protected function authenticate($request, array $guards)
    {

        $this->auth->shouldUse('customer');

        parent::authenticate($request, ['customer']);
    }

    protected function redirectTo($request): ?string
    {
        if (! $request->expectsJson()) {
            return route('customer.login', ['tenants' => request()->segment(1)]);
        }

        return null;
    }
}
