<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureProfileCompleted
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user || $user->isProfileComplete()) {
            return $next($request);
        }

        if ($request->routeIs('profile.edit') || $request->routeIs('profile.update')) {
            return $next($request);
        }

        return redirect()
            ->route('profile.edit')
            ->with('warning', 'Sila lengkapkan profil dan muat naik avatar dahulu sebelum menggunakan fungsi lain.');
    }
}
