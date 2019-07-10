<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        $resource = lcfirst(
            str_singular(
                str_replace(
                    'Controller',
                    '',
                    class_basename($request->route()->getController())
                ))
        );

        if ($resource == 'dashboard') return $next($request);

        if (
            $resource == 'post' &&
            $request->route('post') &&
            $request->route('post')->author_id != $user->id &&
            !$user->can('update-others-post|delete-others-post')
        ) abort(403);

        if (!$user->can("crud-$resource")) abort(403);

        return $next($request);
    }
}
