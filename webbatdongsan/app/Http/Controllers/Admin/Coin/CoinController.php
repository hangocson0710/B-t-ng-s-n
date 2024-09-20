<?php

namespace App\Http\Controllers\Admin\Coin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserTransaction;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CoinController extends Controller
{
    public function request_list(){
        $param['list'] = UserTransaction::where('transaction_type',1)->get();
        return view('Admin.Coin.CoinList',compact('param'));
    }
    public function history_list(){
        $param['list'] = UserTransaction::orderBy('transaction_time','desc')->get();
        return view('Admin.Coin.HistoryCoin',compact('param'));
    }
    public function browse($id){
        $user_transaction = UserTransaction::find($id);
        if($user_transaction==null){
            Toastr::error("Không tồn tại giao dịch");
            return back();
        }
        $user = User::find($user_transaction->user_id);
        if($user==null){
            Toastr::error("Không tồn tại người dùng");
            return back();
        }
        $user_transaction->transaction_status =2;
        $user_transaction->transaction_confirm =1;
        $user_transaction->confirm_by =Auth::guard('admin')->user()->id;
        $user_transaction->confirm_at =time();
        $user->coin_amount+= $user_transaction->transaction_amount;
        $user_transaction->save();
        $user->save();
        Toastr::success("Duyệt thành công");
        return back();
    }
    public function no_browse($id){
        $user_transaction = UserTransaction::find($id);
        if($user_transaction==null){
            Toastr::error("Không tồn tại giao dịch");
            return back();
        }
        $user_transaction->transaction_confirm =2;
        $user_transaction->confirm_by =Auth::guard('admin')->user()->id;
        $user_transaction->confirm_at =time();
        $user_transaction->save();
        Toastr::success("Đã từ chối duyệt");
        return back();
    }
}
