<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use App\Services\FacebookApiService;

class FacebookPixelTracking
{
    public function handle(Request $request, Closure $next)
    {
        if (
            !$request->isMethod('GET') ||
            $request->expectsJson() ||
            $request->is('admin/*')
        ) {
            return $next($request);
        }

        $eventId = (string) Str::uuid();

        // Share Event ID with Blade
        View::share('metaPageViewEventId', $eventId);

        // Generate browser response
        $response = $next($request);
			
			if (
			    $response->getStatusCode() === 200 &&
			    str_contains(
			        $response->headers->get('Content-Type', ''),
			        'text/html'
			    )
			) {
			    app(FacebookApiService::class)
			        ->sendPageView($request, $eventId);
			}

        return $response;
    }
}
