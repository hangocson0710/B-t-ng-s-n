@extends('Home.Layouts.Master')
@section('Content')
    <div class="container">
        <h3 class="text-center">Không đủ coin</h3>
        <div style="width: 250px;margin: 0 auto">
            <img src="{{asset('System/Icons/error.png')}}">
        </div>
        <div class="text-center">
            <p class="text-center">Số dư tài khoản hiện tại không đủ vui lòng <span class="text-success text-bold">nạp thêm coin</span> </p>
            <a href="{{route('nap-coin')}}" class="mb-4 btn btn-warning">Nạp ngay</a>
        </div>
    </div>
@endsection

{{-- @extends('Home.Layouts.Master')
@section('Content')
    <div class="container">
        <h3 class="text-center">Thông báo</h3>
        <div style="width: 250px; margin: 0 auto">
            <img src="{{asset('System/Icons/error.png')}}">
        </div>
        <div class="text-center">
            <p class="text-center">Hiện tại tài khoản của bạn không đủ điều kiện để thực hiện thao tác này.</p>
            <!-- Bạn có thể thêm các tùy chọn khác ở đây, như liên hệ hỗ trợ -->
            <a href="{{route('trang-chu')}}" class="mb-4 btn btn-primary">Về trang chủ</a>
        </div>
    </div>
@endsection --}}
