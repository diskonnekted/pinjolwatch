<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\View;

class MobileViewMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $agent = new Agent();
        
        $isMobile = $agent->isMobile() || $agent->isTablet();
        View::share('is_mobile', $isMobile);

        if ($isMobile) {
            // Prepend mobile views directory so it takes precedence for mobile users
            View::prependLocation(resource_path('views/mobile'));
        }

        return $next($request);
    }
}
