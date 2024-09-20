<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Classified;
use App\Models\Group;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home(){
        return view('Home.Index');
    }

    public function classified_list(Request $request, $group_url){
        // $items = 5;
        // $request->items != '' ? $items = $request->items : null;
        // $param['group_first'] = Group::where('group_url', $group_url)->first();
        // $param['group'] = Group::Wherehas('group_classified')->get();
        // $param['classified'] = Classified::
        //     leftJoin('province', 'classified.province_id', '=', 'province.id')
        //     ->leftJoin('district', 'classified.district_id', '=', 'district.id')
        //     ->leftJoin('ward', 'classified.ward_id', '=', 'ward.id')
        //     ->select(
        //         'classified.*',
        //         DB::raw("(CASE WHEN (classified.is_vip = 1 AND classified.vip_time > " . time() . ") THEN 1 ELSE 2 END) as vip"),
        //         'province.province_name',
        //         'district.district_name',
        //         'ward.ward_name'
        //     )
        //     ->where('classified.group_id', '=', $param['group_first']->id)
        //     ->where('classified.is_show', 1)
        //     ->where('classified.is_deleted', 0)
        //     ->orderBy('vip')
        //     ->orderBy('vip_time', 'desc')
        //     ->orderBy('created_at', 'desc');

        // if ($request->has('search')) {
        //     $param['classified']->where('classified.classified_title', 'LIKE', '%' . $request->search . '%');
        // }

        // $param['classified'] = $param['classified']->paginate($items);

        // return view('Home.Classified-list', compact('param'));
        $items = 10;
    if ($request->items) {
        $items = $request->items;
    }
    

    $param['group_first'] = Group::where('group_url', $group_url)->first();
    $param['group'] = Group::Wherehas('group_classified')->get();
    $classifieds = Classified::leftJoin('province', 'classified.province_id', '=', 'province.id')
        ->leftJoin('district', 'classified.district_id', '=', 'district.id')
        ->leftJoin('ward', 'classified.ward_id', '=', 'ward.id')
        ->select(
            'classified.*',
             DB::raw("(CASE WHEN (classified.is_vip = 1 AND classified.vip_time > " . time() . ") THEN 1 ELSE 2 END) as vip"),
            'province.province_name',
            'district.district_name',
            'ward.ward_name'
        )
        ->where('classified.group_id', '=', $param['group_first']->id)
        ->where('classified.is_show', 1)
        ->where('classified.is_deleted', 0)
        ->orderBy('vip')
        ->orderBy('vip_time','desc')
        ->orderBy('created_at', 'desc');

        if ($request->has('search')) {
            $search = $request->get('search');
            $searchTerms = explode(',', $search);
            foreach ($searchTerms as $term) {
                $term = trim($term);
                $classifieds = $classifieds->where(function($query) use ($term) {
                    $query->where('classified.classified_title', 'LIKE', "%$term%")
                          ->orWhere('classified.classified_address', 'LIKE', "%$term%")
                          ->orWhere('province.province_name', 'LIKE', "%$term%")
                          ->orWhere('district.district_name', 'LIKE', "%$term%")
                          ->orWhere('ward.ward_name', 'LIKE', "%$term%")
                          ->orWhere('classified.classified_price', 'LIKE', "%$term%");
                });
            }
        }
        if ($request->has('min_price') && $request->has('max_price')) {
            $minPrice = $request->get('min_price');
            $maxPrice = $request->get('max_price');
            $classifieds = $classifieds->whereBetween('classified.classified_price', [$minPrice, $maxPrice]);
        }

    $param['classified'] = $classifieds->paginate($items);

    return view('Home.Classified-list', compact('param'));
    }

    public function classified_detail($classified_url){
        $param['group'] = Group::Wherehas('group_classified')->get();
        $param['classified'] = Classified::
            leftJoin('province', 'classified.province_id', '=', 'province.id')
            ->leftJoin('district', 'classified.district_id', '=', 'district.id')
            ->leftJoin('ward', 'classified.ward_id', '=', 'ward.id')
            ->select(
                'classified.*',
                'province.province_name',
                'district.district_name',
                'ward.ward_name'
            )
            ->where('classified.classified_url', '=', $classified_url)
            ->first();

        if (!$param['classified'] || $param['classified']->is_deleted == 1 || $param['classified']->is_show == 0) {
            Toastr::error('Tin không tồn tại');
            return back();
        }
        

        $param['classified_group'] = Classified::
            leftJoin('province', 'classified.province_id', '=', 'province.id')
            ->leftJoin('district', 'classified.district_id', '=', 'district.id')
            ->leftJoin('ward', 'classified.ward_id', '=', 'ward.id')
            ->select(
                'classified.*',
                DB::raw("(CASE WHEN (classified.is_vip = 1 AND classified.vip_time > " . time() . ") THEN 1 ELSE 2 END) as vip"),
                'province.province_name',
                'district.district_name',
                'ward.ward_name'
            )
            ->where('classified.group_id', '=', $param['classified']->group_id)
            ->where('classified.is_show', 1)
            ->where('classified.classified_url', '<>', $classified_url)
            ->where('classified.is_deleted', 0)
            ->orderBy('vip')
            ->orderBy('vip_time', 'desc')
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        return view('Home.Classified.classified-detail', compact('param'));
    }
    public function autocomplete_ajax(Request $request)
    {
        $data = $request->all();
        if($data['query']){
            $classified = Classified::where('is_show', 1)
                ->where('classified_title', 'LIKE', '%' . $data['query'] . '%')
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach ($classified as $key => $val){
                $output .= '<li><a href="#">' . $val->classified_title . '</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
    

    
}
