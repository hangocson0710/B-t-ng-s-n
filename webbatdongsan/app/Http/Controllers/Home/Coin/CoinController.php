<?php

namespace App\Http\Controllers\Home\Coin;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CoinController extends Controller
{
    public function nap_coin(){
        $info = DB::table('about')->first();
        return view('Home.Coin.AddCoin',compact('info'));
    }
    public function post_nap(Request $request){
        $validate = $request->validate([
            'coin_amount'=>'required|integer|min:50',
        ],[
            'coin_amount.required'=>'Vui lòng nhập số coin',
            'coin_amount.integer'=>'Vui lòng nhập số nguyên',
            'coin_amount.min'=>'Số coin nạp tối thiểu là 50',
        ]);
        $transaction = DB::table('user_transaction')->insert([
            'user_id'=>Auth::user()->id,
            'transaction_type'=>1,
            'transaction_code'=>Str::upper(Str::random(8)),
            'transaction_amount'=>$request->coin_amount,
            'transaction_status'=>2,
            'transaction_confirm'=>0,
            'transaction_time'=>time(),
        ]);
        Toastr::success("Nạp thành công");
        return back();
    }
}
