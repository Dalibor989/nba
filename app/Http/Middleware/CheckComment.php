<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckComment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $comments = strtolower(request('content'));

        $comments = explode(" ", $comments);

        $words = ['hate', 'idiot', 'stupid'];

        foreach($words as $word) {
            if(in_array($word, $comments)) {
                return redirect('/forbidden');
            }
        }
        
        return $next($request);
    }
}
