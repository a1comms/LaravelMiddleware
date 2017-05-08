<?php

namespace A1comms\Middleware\Authentication;

use Closure;
use Illuminate\Http\Response;

class AppEngineCronMiddleware
{
    public function handle($request, Closure $next)
    {
        if ( $request->header('X-Appengine-Cron', 'false') !== 'true' )
        {
            return (new Response('Access Denied', 403));
        }

        return $next($request);
    }
}
