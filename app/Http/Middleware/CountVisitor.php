<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Visitor;
use Illuminate\Support\Facades\Auth;

class CountVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();
        $date_visited = date('Y-m-d', time());
        $visitor = Visitor::firstOrCreate([
            'ip' => $ip,
            'date_visited' => $date_visited,
            'user_id' => Auth::id()
        ]);

        DB::table('visitors')
            ->where('user_id', $visitor->user_id)
            ->whereDate('date_visited', $date_visited)
            ->increment('hits');
        return $next($request);
    }
}
