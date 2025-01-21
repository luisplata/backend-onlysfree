<?php

namespace App\Http\Middleware;

use App\Models\ActivitiesAnonymousUsers;
use App\Models\AnonymousUsers;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class TrackAnonymousUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle($request, Closure $next)
    {
        $nameOfCookie = 'anonymous_user_id';
        $anonymousUserId = Cookie::get($nameOfCookie);

        $botUserAgent = '_Bot';
        $agent = $request->header('User-Agent');
        if ($agent.contains($botUserAgent)) {
            $anonymousUserId = $agent;
        }

        if (!$anonymousUserId) {
            $anonymousUserId = (string) Str::uuid7();
            Cookie::queue($nameOfCookie, $anonymousUserId, 60 * 24 * 365);
            Log::info('Generated new UUID:', ['uuid' => $anonymousUserId]);
        }
        if ($anonymousUserId && !AnonymousUsers::where('uuid_user', $anonymousUserId)->exists()) {
            AnonymousUsers::create(['uuid_user' => $anonymousUserId]);
        }
        /*
        {
        "ip": "127.0.0.1",
        "referer": "http://localhost:8000/",
        "extra_data": "some_value",
        "user_agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0"
        }
         */
        ActivitiesAnonymousUsers::create([
            'user_uuid' => $anonymousUserId,
            'page' => $request->path(),
            'data' => json_encode([
                'referer' => $request->header('referer'),
                'ip' => $request->ip(),
                'user_agent' => $request->header('User-Agent'),
                'url' => $request->fullUrl(),
            ]),
        ]);
        Log::info('user anonymous', [
            $nameOfCookie => $anonymousUserId,
            'url' => $request->fullUrl(),
            'data' => $request->all(),
        ]);

        return $next($request);
    }
}
