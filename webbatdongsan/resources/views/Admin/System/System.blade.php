@extends('Admin.Layouts.Master')
@section('Content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>CẤU HÌNH CHUNG</h4>
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
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-block text-dark font-weight-bold" type="button" role="button" data-toggle="collapse" data-target="#about_config">
                            Cấu hình chung
                        </button>
                    </div>
                    <div id="about_config" class="collapse collapsed
                            {{ $errors->count()>0 && ($errors->has('about_logo')
                             ||$errors->has('about_address')
                             ||$errors->has('about_phone')
                             ||$errors->has('about_email')
                             ||$errors->has('about_facebook')
                             ||$errors->has('about_youtube')
                             ||$errors->has('about_info'))?"show":null}}">
                        <div class="card-body">
                            <form action="{{route('admin.system.info')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group text-center">
                                            <label for="input-img">Logo<br><span class="text-warning btn">Tải ảnh lên</span></label>
                                            <div style="margin: 0 auto">
                                                <div id="old" style="width: 100px;margin: 0 auto">
                                                    <img src="{{asset($param['about']->about_logo)}}" class="w-100" id="old">
                                                </div>
                                                <div id="preview" style="width: 100px;margin: 0 auto">
                                                </div>
                                                <input type="file" style="opacity: 0" onchange="previewMutiple(event)" id="input-img" accept="image/png" name="about_logo">
                                            </div>
                                            @if( $errors->count()>0 && $errors->has('about_logo'))
                                                <span class="text-danger">{{$errors->first('about_logo')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <input value="{{$param['about']->about_address}}" name="about_address" class="form-control" type="text">
                                            @if( $errors->count()>0 && $errors->has('about_address'))
                                                <span class="text-danger">{{$errors->first('about_address')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Số điện thoại</label>
                                            <input value="{{$param['about']->about_phone}}" name="about_phone" class="form-control" type="number">
                                            @if( $errors->count()>0 && $errors->has('about_phone'))
                                                <span class="text-danger">{{$errors->first('about_phone')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Địa chỉ email</label>
                                            <input value="{{$param['about']->about_email}}" name="about_email" class="form-control" type="text">
                                            @if( $errors->count()>0 && $errors->has('about_email'))
                                                <span class="text-danger">{{$errors->first('about_email')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Liên kết facebook</label>
                                            <input value="{{$param['about']->about_facebook}}" name="about_facebook" class="form-control" type="text">
                                            @if( $errors->count()>0 && $errors->has('about_facebook'))
                                                <span class="text-danger">{{$errors->first('about_facebook')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Liên kết youtube</label>
                                            <input value="{{$param['about']->about_youtube}}" name="about_youtube" class="form-control" type="text">
                                            @if( $errors->count()>0 && $errors->has('about_youtube'))
                                                <span class="text-danger">{{$errors->first('about_youtube')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Thông tin công ty</label>
                                            <textarea class="form-control" name="about_info">{{$param['about']->about_info}}</textarea>
                                            @if( $errors->count()>0 && $errors->has('about_info'))
                                                <span class="text-danger">{{$errors->first('about_info')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-success">Lưu</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-header">
                        <button class="btn btn-block text-dark font-weight-bold" type="button" role="button" data-toggle="collapse" data-target="#home_config">
                            Cấu hình trang chủ
                        </button>
                    </div>
                    <div id="home_config" class="collapse collapsed {{ $errors->count()>0 && ($errors->has('num_classified')||$errors->has('num_project')||$errors->has('num_news'))?"show":null}}">
                        <div class="card-body">
                            <form action="{{route('admin.system.home')}}" method="post">
                                @csrf
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Số lượng bài viết hiển thị</label>
                                        <input value="{{$param['home']->num_classified}}" name="num_classified" class="form-control" type="number">
                                        @if( $errors->count()>0 && $errors->has('num_classified'))
                                            <span class="text-danger">{{$errors->first('num_classified')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Số lượng dự án hiển thị</label>
                                        <input value="{{$param['home']->num_project}}" name="num_project" class="form-control" type="number">
                                        @if( $errors->count()>0 && $errors->has('num_project'))
                                            <span class="text-danger">{{$errors->first('num_project')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Số lượng tin tức hiển thị</label>
                                        <input value="{{$param['home']->num_news}}" name="num_news" class="form-control" type="number">
                                        @if( $errors->count()>0 && $errors->has('num_news'))
                                            <span class="text-danger">{{$errors->first('num_news')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-success">Lưu</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                 <div class="card mt-5">
                    <div class="card-header">
                        <button class="btn btn-block text-dark font-weight-bold" type="button" role="button" data-toggle="collapse" data-target="#bank_config">
                           Thông tin tài khoản ngân hàng
                        </button>
                    </div>
                    <div id="bank_config" class="collapse collapsed {{$errors->count()>0 &&( $errors->has('bank_author')||$errors->has('bank_number')||$errors->has('bank_name'))?"show":""}}">
                        <div class="card-body">
                            <form action="{{route('admin.system.bank')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Chủ tài khoản</label>
                                            <input value="{{$param['about']->bank_author}}" name="bank_author" class="form-control" type="text">
                                            @if( $errors->count()>0 && $errors->has('bank_author'))
                                                <span class="text-danger">{{$errors->first('bank_author')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Tên ngân hàng</label>
                                            <input value="{{$param['about']->bank_name}}" name="bank_name" class="form-control" type="text">
                                            @if( $errors->count()>0 && $errors->has('bank_name'))
                                                <span class="text-danger">{{$errors->first('bank_name')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Số tài khoản</label>
                                            <input value="{{$param['about']->bank_number}}" name="bank_number" class="form-control" type="number">
                                            @if( $errors->count()>0 && $errors->has('bank_number'))
                                                <span class="text-danger">{{$errors->first('bank_number')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-success">Lưu</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('Script')
<script>
    function previewMutiple(event){
        var input = document.getElementById("input-img");
        $('#old').hide();
        var preview = input.files.length;
        document.getElementById("preview").innerHTML ='';
        var urls = URL.createObjectURL(event.target.files[0]);
        $('#preview-img').show();
        document.getElementById("preview").innerHTML += '<img src="'+urls+'">';
    }

</script>
@endsection
