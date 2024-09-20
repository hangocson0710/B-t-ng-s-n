@extends('Home.Layouts.Master')
@section('Content')
    <div class="liton__wishlist-area pb-70">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <!-- PRODUCT TAB AREA START -->
                    <div class="ltn__product-tab-area">
                        <div class="container-fluid">
                            <div class="row">
                                <x-home.account.side-bar></x-home.account.side-bar>
                                <div class="col-lg-9">
                                    <div class="">
                                        <div class="" id="ltn_tab_1_2">
                                            <div class="ltn__myaccount-tab-content-inner">
                                                <!-- comment-area -->
                                                <div class="ltn__comment-area mb-50">
                                                    <div class="ltn__form-box contact-form-box box-shadow white-bg">
                                                        <h4 class="title-2">Đổi mật khẩu</h4>
                                                        <form id="contact-form" action="" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="input-item input-item-textarea  ltn__custom-icon">
                                                                        <input type="password" name="password_old" value="" placeholder="Nhập mật khẩu cũ">
                                                                        @if( $errors->count()>0 && $errors->has('password_old'))
                                                                            <span class="text-danger">{{$errors->first('password_old')}}</span>
                                                                        @endif

                                                                        @if(Session::has('password-fail'))
                                                                            <span class="text-danger">{{Session::get('password-fail')}}</span>

                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="input-item input-item-textarea  ltn__custom-icon">
                                                                        <input type="password" name="password" value="" placeholder="Nhập mật khẩu mới">
                                                                        @if( $errors->count()>0 && $errors->has('password'))
                                                                            <span class="text-danger">{{$errors->first('password')}}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="input-item input-item-textarea  ltn__custom-icon">
                                                                        <input type="password" name="repeat-password" value="" placeholder="Nhập lại mật khẩu mới">
                                                                        @if( $errors->count()>0 && $errors->has('repeat-password'))
                                                                            <span class="text-danger">{{$errors->first('repeat-password')}}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <div class="btn-wrapper mt-0">
                                                                <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Cập nhật</button>
                                                            </div>
                                                            <p class="form-messege mb-0 mt-20"></p>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- PRODUCT TAB AREA END -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('Script')
{{--    <script src="{{asset('System/param.js')}}"></script>--}}
{{--    <script>--}}
{{--        $(document).ready(function (){--}}
{{--            var district ='{{$param['user']->user->district_id}}';--}}
{{--            get_district('#province_id','#district_id','{{route('param.district','')}}',district);--}}
{{--            setTimeout(()=>{--}}
{{--                get_ward('#district_id','#ward_id','{{route('param.ward','')}}','{{$param['user']->user->ward_id}}');--}}

{{--            },1000)--}}
{{--        });--}}
{{--        function previewMutiple(event){--}}
{{--            var input = document.getElementById("input-img");--}}
{{--            $('#old').hide();--}}
{{--            var preview = input.files.length;--}}
{{--            document.getElementById("preview-img").innerHTML ='';--}}
{{--            var urls = URL.createObjectURL(event.target.files[0]);--}}
{{--            $('#preview-img').show();--}}
{{--            document.getElementById("preview-img").innerHTML += '<img src="'+urls+'">';--}}
{{--        }--}}
{{--    </script>--}}
@endsection
