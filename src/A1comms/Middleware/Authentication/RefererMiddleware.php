<?php

namespace A1comms\Middleware\Authentication;

use Closure;
use Illuminate\Http\Response;

abstract class RefererMiddleware
{
    protected $allowed_list = [];

    public function __construct()
    {

    }

    public function handle($request, Closure $next)
    {
        if ( ! in_array( parse_url($request->header('Referer'), PHP_URL_HOST) , $this->allowed_list) )
        {
            return (new Response('Access Denied', 403));
        }

        return $next($request);
    }
}
