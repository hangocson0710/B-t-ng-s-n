<?php

namespace App\Http\Controllers\Admin\Analytics;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserTransaction;

use Carbon\Carbon;
use Illuminate\Http\Request;


class AnalyticsController extends Controller
{
    public function list(){
        $param['user'] = User::all();
        $total=0;
        $today=0;
        $param['user_new'] = User::where('created_at','>=',strtotime(Carbon::now()->startOfDay()))
                                 ->where('created_at','<=',strtotime(Carbon::now()->endOfDay()))
                                 ->get();

        $param['total']= UserTransaction::where('transaction_status',1)->get();
        foreach ( $param['total'] as $i){
            if($i->transaction_time > strtotime(Carbon::now()->startOfDay()) && $i->transaction_confirm==1){
                $today+=$i->transaction_amount;
            }
            $total+=$i->transaction_amount;
        }

        return view('Admin.Analytics.List',compact('param','total','today'));
    }
}
