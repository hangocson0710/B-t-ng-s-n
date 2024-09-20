@extends('Home.Layouts.Master')
@section('Content')
    <div class="container">
        <h3 class="text-center">Không đủ quyền</h3>
        <div style="width: 250px;margin: 0 auto">
            <img src="{{asset('System/Icons/error.png')}}">
        </div>
        <div class="text-center">
            <p class="text-center">Để đăng được dự án , tài khoản của bạn phải được nâng cấp lên <span class="text-success text-bold">tài khoản doanh nghiệp</span> </p>
            <a href="{{route('nang-cap-tai-khoan')}}" class="mb-4 btn btn-warning">Nâng cấp ngay</a>
        </div>
    </div>
@endsection
