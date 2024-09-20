<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectRequest;
use App\Models\Group;
use App\Models\Project;
use App\Models\Province;
use App\Models\Classified;
use App\Models\Unit;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function list()
    {
        $list = Project::where('is_active', '=', 1)->get();
        return view('Admin.Project.ListProject', compact('list'));
    }

    public function get_edit($id)
    {
        $item['project'] = Project::find($id);
        if ($item['project'] == null) {
            Toastr::error("Không tồn tại dự án");
            return back();
        }
        $item['group'] = Group::where('group_type', '=', 2)->where('is_deleted', '=', 0)->get();
        $item['province'] = Province::all();
        $item['price'] = Unit::where('unit_type', 1)->get();
        $item['area'] = Unit::where('unit_type', 2)->get();
        return view('Admin.Project.Edit', compact('item'));
    }

    public function post_edit(ProjectRequest $request, $id)
    {
        $item = Project::find($id);
        $item->group_id = $request->group_id;
        $item->project_name = $request->project_name;
        $item->project_url = Str::slug($request->project_name) . Str::random(4);
        $item->project_content = $request->project_content;
        $item->project_price = $request->project_price;
        $item->price_type = $request->price_type;
        $item->project_area = $request->project_area;
        $item->area_type = $request->area_type;
        $item->updated_at = time();
        $item->project_address = $request->project_address;
        $item->province_id = $request->province_id;
        $item->district_id = $request->district_id;
        $item->ward_id = $request->ward_id;

        if ($request->hasFile('project_image')) {
            $arrImage = [];
            foreach ($request->file('project_image') as $i) {
                $name = Str::random(4) . time() . '.' . $i->getClientOriginalExtension();
                $i->move(public_path('Uploads/Project/'), $name);
                array_push($arrImage, 'Uploads/Project/' . $name);
            }
            $item->project_image = $arrImage;
        }

        $item->save();

        Toastr::success("Cập nhật thành công");
        return back();
    }

    public function block_display($id)
    {
        $item = Project::find($id);
        if ($item == null) {
            Toastr::error("Không tồn tại dự án");
            return back();
        }
        $item->is_show = 0;
        $item->save();
        Toastr::success("Chặn hiển thị thành công");
        return back();
    }

    public function unblock_display($id)
    {
        $item = Project::find($id);
        if ($item == null) {
            Toastr::error("Không tồn tại dự án");
            return back();
        }
        $item->is_show = 1;
        $item->save();
        Toastr::success("Khôi phục hiển thị thành công");
        return back();
    }

    public function delete_item($id)
    {
        $item = Project::find($id);
        if ($item == null) {
            Toastr::error("Không tồn tại dự án");
            return back();
        }

        // Kiểm tra xem có bất động sản nào liên kết với dự án này không
        $classifiedCount = Classified::where('project_id', $id)->count();
        if ($classifiedCount > 0) {
            Toastr::error("Không thể xóa dự án này vì có bất động sản liên kết với nó.");
            return back();
        }

        $item->is_deleted = 1;
        $item->save();
        $this->updateCategoryCounts();

        Toastr::success("Xóa thành công");
        return back();
    }
    private function updateCategoryCounts()
{
    $groups = Group::withCount(['group_project' => function($query) {
        $query->where('is_deleted', 0)
              ->where('is_show', 1)
              ->where('is_active', 1);
    }])->get();

    foreach ($groups as $group) {
        $group->group_project;
        $group->save();
    }
}

    public function restore_item($id)
    {
        $item = Project::find($id);
        if ($item == null) {
            Toastr::error("Không tồn tại dự án");
            return back();
        }
        $item->is_deleted = 0;
        $item->save();
        Toastr::success("Khôi phục thành công");
        return back();
    }

    public function request_list()
    {
        $list = Project::where('is_active', '=', 0)
            ->orWhere('is_active', '=', 2)
            ->get();
        return view('Admin.Project.ListRequest', compact('list'));
    }

    public function browse($id)
    {
        $item = Project::find($id);
        if ($item == null) {
            Toastr::error("Không tồn tại dự án");
            return back();
        }
        $item->is_active = 1;
        $item->save();
        Toastr::success("Duyệt dự án thành công");
        return back();
    }

    public function no_browse($id)
    {
        $item = Project::find($id);
        if ($item == null) {
            Toastr::error("Không tồn tại dự án");
            return back();
        }
        $item->is_active = 2;
        $item->save();
        Toastr::success("Thao tác thành công");
        return back();
    }
    public function show($id)
{
    $item['project'] = Project::find($id);
    if ($item['project'] == null) {
        Toastr::error("Không tồn tại dự án");
        return back();
    }
    $item['group'] = Group::where('group_type', '=', 2)->where('is_deleted', '=', 0)->get();
    $item['province'] = Province::all();
    $item['price'] = Unit::where('unit_type', 1)->get();
    $item['area'] = Unit::where('unit_type', 2)->get();
    return view('Admin.Project.Show', compact('item'));
}

    


}
