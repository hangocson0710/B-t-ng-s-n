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
                                                    <div class="ltn-author-introducing clearfix">
                                                        <div class="author-img">
                                                            <img src="{{ asset($param['user']->avatar) }}" alt="Author Image">
                                                        </div>
                                                        <div class="author-info">
                                                            <h6>{{ $param['user']->user_type == 1 ? "Tài khoản cá nhân" : "Tài khoản doanh nghiệp" }}</h6>
                                                            <h2>{{ $param['user']->fullname }}</h2>
                                                            <div class="footer-address">
                                                                <ul>
                                                                    <li>
                                                                        <div class="footer-address-icon">
                                                                            <i class="icon-placeholder"></i>
                                                                        </div>
                                                                        <div class="footer-address-info">
                                                                            <p>{{ $param['user']->address }}, {{ $param['user']->ward_name }}, {{ $param['user']->district_name }}, {{ $param['user']->province_name }}</p>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="footer-address-icon">
                                                                            <i class="icon-call"></i>
                                                                        </div>
                                                                        <div class="footer-address-info">
                                                                            <p><a href="tel:{{ $param['user']->phone }}">{{ $param['user']->phone }}</a></p>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="footer-address-icon">
                                                                            <i class="icon-mail"></i>
                                                                        </div>
                                                                        <div class="footer-address-info">
                                                                            <p><a href="mailto:{{ $param['user']->email }}">{{ $param['user']->email }}</a></p>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ltn__form-box contact-form-box box-shadow white-bg">
                                                        <h4 class="title-2">Cập nhật thông tin</h4>
                                                        <form id="contact-form" action="" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="text-center">
                                                                    <label for="input-img" style="margin:0 auto;margin-bottom: 10px">
                                                                    <div class="author-img" id="old" style="width: 100px;height: 100px;margin:0 auto;margin-bottom: 10px ;">
                                                                        <img src="{{ asset($param['user']->avatar) }}" alt="Author Image">
                                                                    </div>
                                                                        <div style="width: 100px;display: none;height: 100px" id="preview-img"></div>
                                                                        @if($errors->count() > 0 && $errors->has('avatar'))
                                                                            <span class="text-danger">{{ $errors->first('avatar') }}</span>
                                                                        @endif
                                                                    </label>
                                                                    <input id="input-img" name="avatar" onchange="previewMutiple(event)" style="position: absolute;opacity: 0" type="file">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="input-item input-item-textarea ltn__custom-icon">
                                                                        <input type="text" name="fullname" value="{{ $param['user']->fullname }}" placeholder="Nhập tên">
                                                                        @if($errors->count() > 0 && $errors->has('fullname'))
                                                                            <span class="text-danger">{{ $errors->first('fullname') }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="input-item input-item-textarea ltn__custom-icon">
                                                                        <input type="text" name="phone" value="{{ $param['user']->phone }}" placeholder="Nhập SDT">
                                                                        @if($errors->count() > 0 && $errors->has('phone'))
                                                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="input-item input-item-textarea ltn__custom-icon">
                                                                        <input type="text" name="address" value="{{ $param['user']->address }}" placeholder="Nhập địa chỉ">
                                                                        @if($errors->count() > 0 && $errors->has('address'))
                                                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="input-item">
                                                                        <select name="province_id" id="province_id"
                                                                                onchange="get_district(this, '#district_id', '{{ route('param.district', '') }}')"
                                                                                class="nice-select">
                                                                            <option value="">Tỉnh/Thành phố</option>
                                                                            @foreach($param['province'] as $i)
                                                                                <option value="{{ $i->id }}" {{ $i->id == $param['user']->province_id ? "selected" : "" }}>{{ $i->province_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @if($errors->count() > 0 && $errors->has('province_id'))
                                                                            <span class="text-danger">{{ $errors->first('province_id') }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="input-item">
                                                                        <select name="district_id"
                                                                                onchange="get_ward(this, '#ward_id', '{{ route('param.ward', '') }}')"
                                                                                id="district_id" class="nice-select">
                                                                            <option value="">---Chọn</option>
                                                                        </select>
                                                                        @if($errors->count() > 0 && $errors->has('district_id'))
                                                                            <span class="text-danger">{{ $errors->first('district_id') }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="input-item">
                                                                        <select name="ward_id" id="ward_id" class="nice-select">
                                                                            <option value="">---Chọn</option>
                                                                        </select>
                                                                        @if($errors->count() > 0 && $errors->has('ward_id'))
                                                                            <span class="text-danger">{{ $errors->first('ward_id') }}</span>
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
    <script src="{{ asset('System/param.js') }}"></script>
    <script>
        $(document).ready(function (){
            var district ='{{ $param['user']->district_id }}';
            get_district('#province_id', '#district_id', '{{ route('param.district', '') }}', district);
            setTimeout(()=>{
                get_ward('#district_id', '#ward_id', '{{ route('param.ward', '') }}', '{{ $param['user']->ward_id }}');
            }, 1000)
        });
        function previewMutiple(event){
            var input = document.getElementById("input-img");
            $('#old').hide();
            var preview = input.files.length;
            document.getElementById("preview-img").innerHTML ='';
            var urls = URL.createObjectURL(event.target.files[0]);
            $('#preview-img').show();
            document.getElementById("preview-img").innerHTML += '<img src="'+urls+'">';
        }
    </script>
@endsection
