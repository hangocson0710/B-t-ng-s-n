@extends('Admin.Layouts.Master')
@section('Content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>DANH SÁCH NẠP COIN</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Simple Datatable start -->
                <div class="card-box mb-30 pt-30">
                    <div class="pb-20">
                        <table style="width: 100%" class="data-table table stripe hover nowrap">
                            <thead>
                            <tr>
                                <th class="table-plus">Tài khoản</th>
                                <th>Loại giao dịch</th>
                                <th>Số coin</th>
                                <th>Thời gian giao dịch</th>
                                <th>Trạng thái</th>
                                <th>Người xác nhận</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($param['list'] as $item)
                                <tr>
                                    <td class="table-plus">{{$item->user->username??"Tài khoản đã xóa"}}</td>
                                    <td>{{$item->transaction_type ==1 ?"Nạp coin":""}}
                                        {{$item->transaction_type ==2 ?"Đăng tin":""}}
                                        {{$item->transaction_type ==3 ?"Đăng dự án":""}}
                                        {{$item->transaction_type ==4 ?"Nâng cấp tài khoản":""}}
                                    </td>
                                    <td>{{number_format($item->transaction_amount,0,'','.')." Coin"}}</td>
                                    <td>{{date('d/m/Y H:i',$item->transaction_time)}}</td>
                                    <td>
                                        @if($item->transaction_confirm == 0)
                                            <span class="text-warning">Đang chờ</span>
                                        @elseif($item->transaction_confirm == 1)
                                            <span class="text-success">Thành công</span>
                                        @else
                                            <span class="text-danger">Thất bại</span>
                                        @endif
                                    </td>
                                    <td>{{$item->admin->admin_fullname??""}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
@section('Script')
    <script src="{{asset('System/Admin/vendors/scripts/datatable-setting.js')}}"></script>
@endsection
