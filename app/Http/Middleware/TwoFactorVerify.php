<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class TwoFactorVerify
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
        // Check if admin is authenticated
        $logg = Auth::guard('admin')->user();
        if (!$logg) {
            return redirect()->route('admin.login');
        }
        
        // Find the admin user by ID instead of email to avoid null issues
        $user = Admin::find($logg->id);
        
        // If user not found, proceed without 2FA check
        if (!$user) {
            return $next($request);
        }
        
        // Check if 2FA is enabled and needs verification
        if($user->enable_2fa == "enabled" && $user->pass_2fa == "false"){
            return redirect('/admin/2fa');  
        }
        
        return $next($request);
    }
}
