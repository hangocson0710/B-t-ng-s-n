<?php
namespace App\Http\Controllers\Admin\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Staff\AddGroupRequest;
use App\Http\Requests\Admin\Staff\AddStaffRequest;
use App\Http\Requests\Admin\Staff\UpdateGroupRequest;
use App\Http\Requests\Admin\Staff\UpdateStaffRequest;
use App\Models\Admin;
use App\Models\Page;
use App\Models\Role;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function group_admin(){
        $param['role'] = Role::all();
        return view('Admin.Staff.ManagerGroup', compact('param'));
    }

    public function add_group(){
        $param['page'] = Page::all();
        return view('Admin.Staff.AddGroup', compact('param'));
    }

    public function post_add(AddGroupRequest $request){
        $role = new Role();
        $role->role_name = $request->group_name;
        $role->permission = json_encode($request->page);
        $role->save();

        Toastr::success("Thêm thành công");
        return redirect(route('admin.staff.group'));
    }

    public function edit($id){
        $param['page'] = Page::all();
        $param['role'] = Role::find($id);
        return view('Admin.Staff.EditGroup', compact('param'));
    }

    public function post_edit(UpdateGroupRequest $request, $id){
        $role = Role::find($id);
        if ($role == null) {
            Toastr::error("Không tồn tại");
            return back();
        }
        $role->role_name = $request->group_name;
        $role->permission = json_encode($request->page);
        $role->save();

        Toastr::success("Cập nhật thành công");
        return redirect(route('admin.staff.group'));
    }

    public function delete_group($id){
        $role = Role::find($id);
        if ($role == null) {
            Toastr::error("Không tồn tại");
            return back();
        }

        $role->delete();
        Toastr::success("Xóa thành công");
        return back();
    }

    #danh sách nhân viên
    public function list_staff(){
        $param['list'] = Admin::all();
        //        $param['list'] = Admin::with('role')->get();
        return view('Admin.Staff.ListStaff', compact('param'));
    }

    #thêm nhân viên
    public function add_staff(){
        $param['role'] = Role::all();
        return view('Admin.Staff.AddStaff', compact('param'));
    }

    public function post_add_staff(AddStaffRequest $request){
        try {
            $staff = new Admin();
            $staff->admin_fullname = $request->admin_fullname;
            $staff->admin_email = $request->admin_email;
            $staff->admin_phone = $request->admin_phone;
            $staff->admin_username = $request->admin_username;
            $staff->password = Hash::make($request->password);
            $staff->admin_image = 'System/Admin/Avatar/avt_default.png';
    
            if ($request->hasFile('admin_image')) {
                $name = time().'.'.$request->file('admin_image')->getClientOriginalExtension();
                $request->file('admin_image')->move(public_path('System/Admin/Avatar/'), $name);
                $staff->admin_image = 'System/Admin/Avatar/'.$name;
            }
    
            $staff->role_id = $request->role;
            $staff->save();
    
            Toastr::success("Thêm nhân viên thành công");
            return redirect(route('admin.staff.list'));
        } catch (\Exception $e) {
            Toastr::error("Đã xảy ra lỗi: " . $e->getMessage());
            return back()->withInput();
        }
    }

    public function edit_staff($id){
        $param['admin'] = Admin::find($id);
        $param['role'] = Role::all();
        if ($param['admin'] == null) {
            Toastr::error('Không tồn tại nhân viên');
            return back();
        }
        return view('Admin.Staff.EditStaff', compact('param'));
    }

    public function post_edit_staff(UpdateStaffRequest $request, $id){
        $staff = Admin::find($id);
        if ($staff == null) {
            Toastr::error('Không tồn tại nhân viên');
            return back();
        }

        $staff->admin_fullname = $request->admin_fullname;
        $staff->admin_email = $request->admin_email;
        $staff->admin_phone = $request->admin_phone;
        $staff->admin_username = $request->admin_username;

        if ($request->hasFile('admin_image')) {
            $name = time().'.'.$request->file('admin_image')->getClientOriginalExtension();
            $request->file('admin_image')->move(public_path('System/Admin/Avatar/'), $name);
            $staff->admin_image = 'System/Admin/Avatar/'.$name;
        }

        $staff->role_id = $request->role;
        $staff->save();

        Toastr::success("Cập nhật thành công");
        return redirect(route('admin.staff.list'));
    }

    public function block($id){
        $admin = Admin::find($id);
        if ($admin == null) {
            Toastr::error('Không tồn tại');
            return back();
        }

        $admin->is_active = 0;
        $admin->save();
        Toastr::success('Hủy kích hoạt thành công');
        return back();
    }

    public function unblock($id){
        $admin = Admin::find($id);
        if ($admin == null) {
            Toastr::error('Không tồn tại');
            return back();
        }

        $admin->is_active = 1;
        $admin->save();
        Toastr::success('Kích hoạt thành công');
        return back();
    }
}
