<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MainMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if (auth()->user()->application != null) {
        //     if (auth()->user()->application->student != null) {
        //         return Redirect::to('/student');
        //     }
        //     if (auth()->user()->application->lecturer != null) {
        //         return Redirect::to('/lecturer');
        //     }
        //     if (auth()->user()->application->staff != null) {
        //         return Redirect::to('/staff');
        //     }
        // }
        // else {
        //     return Redirect::to('/admin');
        // }
    }
}
