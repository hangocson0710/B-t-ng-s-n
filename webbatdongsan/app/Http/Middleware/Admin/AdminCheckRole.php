<?php
namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Role;

class AdminCheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  mixed $id_page
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $id_page)
    {
        $user = Auth::guard('admin')->user();

        if ($user->admin_type == 1) { // Super admin
            return $next($request);
        }

        $role = Role::find($user->role_id);
        $permissions = json_decode($role->permission, true);

        if (is_array($permissions) && in_array($id_page, $permissions)) {
            return $next($request);
        }

        Toastr::warning('Không đủ quyền');
        return redirect()->back();
    }
}
