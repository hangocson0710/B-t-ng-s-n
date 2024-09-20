<?php

namespace App\Http\Controllers\Home\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\CreatedProjectRequest;
use App\Models\ClassifiedParam;
use App\Models\Group;
use App\Models\Project;
use App\Models\Province;
use App\Models\Classified;
use App\Models\Unit;
use App\Models\User;
use App\Models\UserTransaction;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request; // Thêm dòng này
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function dang_du_an()
    {
        if(Auth::user()->user_type == 1){
            Toastr::error('Lỗi');
            return view('Home.PageError.ErrorProject');
        }
        $item['group'] = Group::where('group_type', '=', 2)->where('is_deleted', '=', 0)->get();
        $item['project'] = Project::where(['is_show' => 1, 'is_active' => 1, 'is_deleted' => 0])->get();
        $item['province'] = Province::all();
        $item['price'] = Unit::where('unit_type', 1)->get();
        $item['area'] = Unit::where('unit_type', 2)->get();
        $item['num_bed'] = ClassifiedParam::where('param_type', 'P')->get();
        $item['num_toi'] = ClassifiedParam::where('param_type', 'T')->get();
        return view('Home.Project.add-project', compact('item'));
    }

    public function post_dang_du_an(CreatedProjectRequest $request)
    {
        $config = DB::table('package_price')->first();
        $price = $config->price_project;

        // Kiểm tra số dư hiện tại của người dùng
        if(Auth::user()->coin_amount < $price){
        Toastr::error("Số dư không đủ để đăng dự án.");
        return back();
    }

        $project = new Project();
        $project->group_id = $request->group_id;
        $project->user_id = Auth::user()->id;
        $project->project_name = $request->project_name;
        $project->project_url = Str::slug($request->project_name) . '-' . Str::random(4);
        $project->project_content = $request->project_content;
        $project->project_price = $request->project_price;
        $project->price_type = $request->price_type;
        $project->is_active = 0;
        $project->project_area = $request->project_area;
        $project->area_type = $request->area_type;
        $project->created_at = time();
        $project->created_by = Auth::user()->id;
        $project->project_address = $request->project_address;
        $project->province_id = $request->province_id;
        $project->district_id = $request->district_id;
        $project->ward_id = $request->ward_id;

        if ($request->hasFile('project_image')) {
            $arrImage = [];
            foreach ($request->file('project_image') as $i) {
                $name = Str::random(4) . time() . '.' . $i->getClientOriginalExtension();
                $i->move(public_path('Uploads/Project/'), $name);
                array_push($arrImage, 'Uploads/Project/' . $name);
            }
            $project->project_image = json_encode($arrImage);
        }

        $project->save();
        // Trừ số dư của người dùng
    $user = User::find(Auth::user()->id);
    $user->coin_amount -= $price;
    $user->save();

    // Lưu lịch sử giao dịch
    $transaction = new UserTransaction();
    $transaction->transaction_type = 2; // Loại giao dịch: chi tiêu
    $transaction->transaction_code = Str::upper(Str::random(8));
    $transaction->transaction_amount = $price;
    $transaction->transaction_status = 1; // Giao dịch thành công
    $transaction->transaction_time = time();
    $transaction->transaction_confirm = 1;
    $transaction->save();

        Toastr::success("Đăng dự án thành công, đang chờ BQT duyệt");
        return redirect(route('trang-chu'));
    }

    public function list($group_url, Request $request) // Sửa lỗi ở đây
    {
        $items = 10;
        $request->items != '' ? $items = $request->items : null;
        $param['group_first'] = Group::where('group_url', $group_url)->first();
        $param['group'] = Group::Wherehas('group_project')->get();
        $param['project'] = Project::
            leftJoin('province', 'project.province_id', '=', 'province.id')
            ->leftJoin('district', 'project.district_id', '=', 'district.id')
            ->leftJoin('ward', 'project.ward_id', '=', 'ward.id')
            ->select('project.*', 'province.province_name', 'district.district_name', 'ward.ward_name')
            ->where('project.group_id', '=', $param['group_first']->id)
            ->where('project.is_show', 1)
            ->where('project.is_deleted', 0)
            ->where('project.is_active', 1)
            ->orderBy('created_at', 'desc');

        if ($request->has('search')) {
            $param['project']->where('project.project_name', 'LIKE', '%' . $request->search . '%');
        }

        $param['project'] = $param['project']->paginate($items);

        return view('Home.Project.list', compact('param'));
    }


public function project_detail($project_url) // Thêm phương thức này
    {
        $param['group'] = Group::Wherehas('group_project')->get();
    $project = Project::
        leftJoin('province', 'project.province_id', '=', 'province.id')
        ->leftJoin('district', 'project.district_id', '=', 'district.id')
        ->leftJoin('ward', 'project.ward_id', '=', 'ward.id')
        ->select(
            'project.*',
            'province.province_name',
            'district.district_name',
            'ward.ward_name'
        )
        ->where('project.project_url', '=', $project_url)
        ->first();

    if (!$project) {
        Toastr::error('Tin không tồn tại');
        return redirect()->back();
    }
    $classifieds = Classified::where('project_id', $project->id)->get();
    return view('Home.Project.detail', compact('param', 'project','classifieds'));
    
    }

    //tìm kiếm tự động
    public function autocomplete_ajax_project(Request $request)
    {
        $data = $request->all();
        if($data['query']){
            $projects = Project::where('is_show', 1)
                ->where('project_name', 'LIKE', '%' . $data['query'] . '%')
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach ($projects as $key => $project){
                $output .= '<li><a href="#">' . $project->project_name . '</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }


}
