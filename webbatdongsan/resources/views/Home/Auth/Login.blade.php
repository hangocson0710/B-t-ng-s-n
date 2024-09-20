@extends('Home.Layouts.Master')
@section('Style')
    <style>
        input[type="text"], input[type="email"], input[type="password"], input[type="submit"], textarea{
            margin-bottom: 0;
            margin-top: 30px;

        }
        .account-login-inner span{
            /*margin-bottom: 30px;*/
        }

    </style>
@endsection
@section('Content')
    <!-- LOGIN AREA START (Register) -->
    <div class="ltn__login-area pb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h1 class="section-title">Đăng nhập<br></h1>
{{--                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br>--}}
{{--                            Sit aliquid,  Non distinctio vel iste.</p>--}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="account-login-inner">
                        <form action="{{route('dang-nhap')}}" method="post" class="ltn__form-box contact-form-box">
                            @csrf
                            <input type="text" name="username" placeholder="Tài khoản *">
                            @if( $errors->count()>0 && $errors->has('username'))
                                <span class="text-danger">{{$errors->first('username')}}</span>
                            @endif
                            <input type="password" name="password" placeholder="Mật khẩu *">
                            @if( $errors->count()>0 && $errors->has('password'))
                                <span class="text-danger">{{$errors->first('password')}}</span>
                            @endif
                            @if(\Illuminate\Support\Facades\Session::has('error'))
                                <span class="text-danger">{{\Illuminate\Support\Facades\Session::get('error')}}</span>

                            @endif
                            <div class="btn-wrapper">
                                <button class="theme-btn-1 btn reverse-color btn-block" type="submit">ĐĂNG NHẬP</button>
                            </div>
                        </form>
                        <div class="by-agree text-center">
                            <p></p>
                            {{--                            <p><a href="#">Tài khoản doanh nghiệp</a></p>--}}
                            <div class="go-to-btn mt-50">
                                <a href="{{route('dang-ki')}}">Chưa có tài khoản ? Đăng kí</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGIN AREA END -->
@endsection
