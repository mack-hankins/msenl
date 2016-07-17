<?php

namespace Msenl\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use narutimateum\Toastr\Facades\Toastr;

class EditProfileMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $request->session()->forget('toastr::notifications');
        if($request->user() && !$request->user()->postalcode)
        {
            $message = 'You still need to <a href='.url('user/'.$request->user()->id.'/edit').'>edit your profile</a> to update badges and enter your zip code';

           Toastr::warning(
                $message,
                'Edit Your Profile'
            );
        }

        return $next($request);
    }
}
