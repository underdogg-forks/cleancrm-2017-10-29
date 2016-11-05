<?php

namespace App\Http\Middleware;

use Closure;
use Theme;

class ThemeLoader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param String $theme
     * @param String $layout
     * @return mixed
     */
    public function handle($request, Closure $next, $theme = 'default', $layout = 'default')
    {
        $response = $next($request);

        if ($request->isMethod('GET')) {
            // get the original content
            $originalContent = $response->getOriginalContent();

            // get the view name
            $view_name = $originalContent->getName();

            // Get the data we passed to our view
            $data = $originalContent->getData();

            // return from theme
            $theme = theme($theme, $layout);

            // render to theme and particular layout
            return $theme->scope($view_name, $data)->render();
        }

        return $response;

    }
}
