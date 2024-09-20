@extends('Home.Layouts.Master')
@section('Content')
    <div class="container">
        <h3 class="text-center">Nâng cấp tài khoản</h3>
        <div style="width: 250px; margin: 0 auto">
{{--            <img src="{{asset('System/Icons/error.png')}}">--}}
        </div>
        <div class="">
            <p class="text-center"><span class="text-success text-bold">Tài khoản doanh nghiệp</span></p>
            <p class="text-center">Sau khi nâng cấp, tài khoản của bạn sẽ có thể đăng dự án và được hiển thị tại mục doanh nghiệp</p>
            <p class="text-center text-danger">Phí nâng cấp: 200 coin</p>
            <form action="{{route('xac-nhan-nang-cap-tai-khoan')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row text-left">
                    <div class="form-group">
                        <label>Tên công ty</label>
                        <input name="business_name" class="form-control" placeholder="Tên công ty">
                        @if($errors->has('business_name'))
                            <span class="text-danger text-left">{{$errors->first('business_name')}}</span>
                        @endif
                    </div>
                    <div class="form-group mt-2">
                        <label>Ảnh giấy phép kinh doanh</label>
                        <input type="file" name="license" class="form-control">
                        @if($errors->has('license'))
                            <span class="text-danger text-left">{{$errors->first('license')}}</span>
                        @endif
                    </div>
                </div>
                <p class="text-center text-success">Để nâng cấp tài khoản doanh nghiệp, bạn phải điền tên công ty và upload giấy phép kinh doanh</p>
                <div class="text-center">
                    <button type="submit" class="mb-4 btn btn-warning" style="margin: 0 auto;">Nâng cấp ngay</button>
                </div>
            </form>
        </div>
    </div>
@endsection
