<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request ->age <18){
            return redirect()->route('welcome')
                ->with('error', 'Get out');
        }
        return $next($request);
    }
}
