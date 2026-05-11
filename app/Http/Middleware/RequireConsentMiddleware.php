<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RequireConsentMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Digunakan untuk route admin yang mengakses/mengekspor data pribadi
        if (Auth::check() && (!Session::has('consent_acknowledged') || !Session::get('consent_acknowledged'))) {
            // In a real app, you might redirect to a consent page.
            // For now, we'll forbid access.
            return response()->view('errors.consent-required', [], 403);
        }

        return $next($request);
    }
}
