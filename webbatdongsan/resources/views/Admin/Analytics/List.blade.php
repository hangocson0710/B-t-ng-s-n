@extends('Admin.Layouts.Master')
@section('Content')

     <div class="main-container">
        <div class="row">
            <div class="col-3">
                <div class="box bg-light">
                    <h4 class="box-title">Tất cả người dùng</h4>
                    <div class="content">{{ $param['user']->count()}}</div>
                </div>
            </div>
            <div class="col-3">
                <div class="box bg-info">
                    <h4 class="box-title text-white">Tài khoản cá nhân</h4>
                    <div class="content text-white">{{ $param['user']->where('user_type',1)->count()}}</div>
                </div>
            </div>
            <div class="col-3">
                <div class="box">
                    <h4 class="box-title">Tài khoản doanh nghiệp </h4>
                    <div class="content">{{ $param['user']->where('user_type',2)->count()}}</div>
                </div>
            </div>
            <div class="col-3">
                <div class="box bg-dark">
                    <h4 class="box-title text-white">Thành viên mới hôm nay</h4>
                    <div class="content text-white">{{  $param['user_new']->count()}}</div>
                </div>
            </div>
        </div>
        <h3 class="mt-5 mb-2">Doanh thu</h3>
        <div class="row">
            <div class="col-3">
                <div class="box bg-success">
                    <h4 class="box-title text-white">Tổng doanh thu</h4>
                    <div class="content text-white">{{number_format($total*1000,0,'','.')}}</div>
                </div>
            </div>
            <div class="col-3">
                <div class="box bg-green">
                    <h4 class="box-title">Hôm nay</h4>
                    <div class="content">{{number_format($today*1000,0,'','.')}}</div>
                </div>
            </div>

    </div> 

@endsection
@section('Style')
    <style>
        .box{
            background: rgba(157, 157, 157, 0.45);
            padding: 1rem;
            height: 150px;
            border-radius: 15px;
        }
        .box .box-title{
            text-align: center;
            font-weight: 500;
        }
        .box .content{
            margin-top: 1rem;
            font-size: 3rem;
            text-align: center;
        }
    </style>
@endsection
