<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class IsInstaller
{
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->is_installer === 1) {
            return $next($request);
        }
        
        return redirect()->route('front')->with('toast_success', 'Only Installer can visit there!');
    }
}
