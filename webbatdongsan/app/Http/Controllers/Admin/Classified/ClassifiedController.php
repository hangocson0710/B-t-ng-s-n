<?php

namespace App\Http\Controllers\Admin\Classified;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClassifiedRequest;
use App\Models\Classified;
use App\Models\ClassifiedParam;
use App\Models\Group;
use App\Models\Project;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\Unit;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClassifiedController extends Controller
{
    public function list()
    {
        $param['classified'] = Classified::all();
        return view('Admin.Classified.ListClassified', compact('param'));
    }

    public function edit($id)
    {
        $param['province'] = Province::get();
        $param['project'] = Project::where('is_show', 1)
            ->where('is_active', 1)
            ->where('is_deleted', 0)
            ->get();
        $param['group'] = Group::where('group_type', 1)->get();
        $param['area'] = Unit::where('unit_type', 2)->get();
        $param['price'] = Unit::where('unit_type', 1)->get();
        $param['num_bed'] = ClassifiedParam::where('param_type', 'P')->get();
        $param['num_toi'] = ClassifiedParam::where('param_type', 'T')->get();
        $param['classified'] = Classified::find($id);
        $param['district'] = $param['classified'] ? District::where('province_id', $param['classified']->province_id)->get() : [];
        $param['ward'] = $param['classified'] ? Ward::where('district_id', $param['classified']->district_id)->get() : [];

        return view('Admin.Classified.EditClassified', compact('param'));
    }

    public function post_edit(ClassifiedRequest $request, $id)
    {
        $item = Classified::find($id);

        $item->group_id = $request->group_id;
        $item->project_id = $request->project_id;
        $item->classified_title = $request->classified_title;
        $item->classified_url = Str::slug($request->classified_title) . Str::random(4);
        $item->classified_content = $request->classified_content;
        $item->classified_price = $request->classified_price;
        $item->price_type = $request->price_type;
        $item->classified_area = $request->classified_area;
        $item->area_type = $request->area_type;
        $item->num_bed = $request->num_bed;
        $item->num_toi = $request->num_toi;
        $item->classified_address = $request->classified_address;
        $item->province_id = $request->province_id;
        $item->district_id = $request->district_id;
        $item->ward_id = $request->ward_id;
        $item->updated_at = time();

        if ($request->hasFile('classified_image')) {
            $arrImage = [];
            foreach ($request->file('classified_image') as $i) {
                $name = Str::random(4) . time() . '.' . $i->getClientOriginalExtension();
                $i->move(public_path('Uploads/Classified/'), $name);
                array_push($arrImage, 'Uploads/Classified/' . $name);
            }
            $item->classified_image = $arrImage;
        }

        $item->save();

        Toastr::success("Cập nhật thành công");
        return redirect(route('admin.classified.list'));
    }

    public function block_display($id)
    {
        $classified = Classified::find($id);
        if ($classified == null) {
            Toastr::error("Không tồn tại");
            return back();
        }
        $classified->is_show = 0;
        $classified->save();
        Toastr::success("Chặn hiển thị thành công");
        return back();
    }

    public function unblock_display($id)
    {
        $classified = Classified::find($id);
        if ($classified == null) {
            Toastr::error("Không tồn tại");
            return back();
        }
        $classified->is_show = 1;
        $classified->save();
        Toastr::success("Khôi phục hiển thị thành công");
        return back();
    }

    public function delete($id)
    {
        $classified = Classified::find($id);
        if ($classified == null) {
            Toastr::error("Không tồn tại");
            return back();
        }
        $classified->is_deleted = 1;
        $classified->save();
        Toastr::success("Xóa thành công");
        return back();
    }

    public function restore($id)
    {
        $classified = Classified::find($id);
        if ($classified == null) {
            Toastr::error("Không tồn tại");
            return back();
        }
        $classified->is_deleted = 0;
        $classified->save();
        Toastr::success("Khôi phục thành công");
        return back();
    }
    public function show($id)
{
    $item['classified'] = Classified::with(['group','project', 'province', 'district', 'ward', 'priceType', 'areaType'])->find($id);

    if (!$item['classified']) {
        Toastr::error('Không tìm thấy bài viết');
        return redirect()->route('admin.classified.list');
    }

    return view('Admin.Classified.Show', compact('item'));
}
}

