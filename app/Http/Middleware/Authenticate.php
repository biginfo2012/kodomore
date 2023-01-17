<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Log;

class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     * @param null $guard
     * @return string
     */
//    protected function redirectTo($request)
//    {
//        $uid = session()->get(SESS_UID);
//        if(!isset($uid) && $uid == null) {
//            return '/test/admin/login';
//        }
//    }

    public function handle($request, Closure $next, $guard = null)
    {
        $uid = session()->get(SESS_UID);
        log::info($uid);

        if(!isset($uid) && $uid == null) {
            $url = $request->path();
            log::info("Insert session ".$url);
            session()->put('redirect_url', $url);
            if($request->is('admin/*')) {

                return redirect('admin/login');
            }
//            if($request->is('test/admin/*')) {
//                return redirect('test/admin/login');
//            }
//            if($request->is('test/*')) {
//                return redirect('test/login');
//            }
            return redirect('login');
        }

        $garden_id = session()->get(SESS_GARDEN_ID);
        if(!isset($garden_id) && $garden_id == null) {
            if($request->is('admin/*')) {
                $url = $request->path();
                session()->put('redirect_url', $url);
                return redirect('admin/login');
            }
//            if($request->is('test/admin/*')) {
//                return redirect('test/admin/login');
//            }
        }

        return $next($request);
    }


}
