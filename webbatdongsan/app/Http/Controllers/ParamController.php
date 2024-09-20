<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Ward;
use Illuminate\Http\Request;

class ParamController extends Controller
{
    public function get_district($id){
        $list = District::where('province_id',$id)->get();
        $html = "";
        foreach ($list as $i){
            $html .= "<option value='".$i->id."'>".$i->district_name."</option>";
        }
        return response()->json(['district'=>$html],200);
    }
    public function get_ward($id){
        $list = Ward::where('district_id',$id)->get();
        $html = "";
        foreach ($list as $i){
            $html .= "<option value='".$i->id."'>".$i->ward_name."</option>";
        }
        return response()->json(['ward'=>$html],200);
    }
}
