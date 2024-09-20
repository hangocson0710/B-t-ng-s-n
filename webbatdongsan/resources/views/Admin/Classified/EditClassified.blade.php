@extends('Admin.Layouts.Master')
@section('Content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Chỉnh sửa bài viết</h4>
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
                    <form action="" method="post" enctype="multipart/form-data" multiple="multiple">
                        @csrf
                        <div class="pb-20">
                            <div class="row">
                                <div class="col-8  pl-30">
                                    <div class="form-group">
                                        <label>Tiêu đề</label>
                                        <input name="classified_title" type="text" class="form-control" value="{{$param['classified']->classified_title}}">
                                        @if( $errors->count()>0 && $errors->has('classified_title'))
                                            <span class="text-danger">{{$errors->first('classified_title')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-4 pr-30">
                                    <div class="form-group">
                                        <label>Chuyên mục</label>
                                        <select name="group_id" class="custom-select2 form-control">
                                            @foreach($param['group']->where('parent_id','<>',null) as $i)
                                                <option value="{{$i->id}}" {{$i->id == $param['classified']->group_id?"selected":null}}>{{$i->group_name}}</option>
                                            @endforeach
                                        </select>
                                        @if( $errors->count()>0 && $errors->has('group_id'))
                                            <span class="text-danger">{{$errors->first('group_id')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 pl-30 pr-30">
                                    <div class="form-group">
                                        <label>Thuộc dự án</label>
                                        <select name="project_id" id="" class="custom-select2 form-control">
                                            <option value="">---Chọn dự án</option>
                                            @foreach( $param['project'] as $i)
                                                <option {{$param['classified']->project_id==$i->id?"selected":null }} value="{{$i->id}}" >{{$i->project_name}}</option>
                                            @endforeach
                                        </select>
                                        @if( $errors->count()>0 && $errors->has('province_id'))
                                            <span class="text-danger">{{$errors->first('province_id')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-3 pl-30">
                                    <div class="form-group">
                                        <label>Địa chỉ</label>
                                        <input name="classified_address" class="form-control" value="{{old('classified_address')??$param['classified']->classified_address}}">
                                        @if( $errors->count()>0 && $errors->has('classified_address'))
                                            <span class="text-danger">{{$errors->first('classified_address')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-3 pl-30">
                                    <div class="form-group">
                                        <label>Tỉnh/Thành phố</label>
                                        <select name="province_id" id="province_id" onchange="get_district(this,'#district_id','{{route('param.district','')}}')" class="form-control">
                                            @foreach( $param['province'] as $i)
                                                <option {{$param['classified']->province_id==$i->id?"selected":null }} value="{{$i->id}}" >{{$i->province_name}}</option>
                                            @endforeach
                                        </select>
                                        @if( $errors->count()>0 && $errors->has('province_id'))
                                            <span class="text-danger">{{$errors->first('province_id')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-3 pl-30">
                                    <div class="form-group">
                                        <label>Quận/Huyện</label>
                                        <select name="district_id" id="district_id" onchange="get_ward(this,'#ward_id','{{route('param.ward','')}}',null)" class="form-control">
                                            <option value="">Chọn----</option>
                                            @foreach( $param['district'] as $i)
                                                <option {{$param['classified']->district_id==$i->id?"selected":null }} value="{{$i->id}}" >{{$i->district_name}}</option>
                                            @endforeach
                                        </select>
                                        @if( $errors->count()>0 && $errors->has('district_id'))
                                            <span class="text-danger">{{$errors->first('district_id')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-3 pl-30">
                                    <div class="form-group">
                                        <label>Xã/Phường</label>
                                        <select name="ward_id" id="ward_id" class="form-control">
                                            <option value="">Chọn----</option>
                                            @foreach( $param['ward'] as $i)
                                                <option {{$param['classified']->ward_id==$i->id?"selected":null }} value="{{$i->id}}" >{{$i->ward_name}}</option>
                                            @endforeach
                                        </select>
                                        @if( $errors->count()>0 && $errors->has('ward_id'))
                                            <span class="text-danger">{{$errors->first('ward_id')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 pl-30">
                                    <div class="form-group">
                                        <label>Nội dung</label>
                                        <textarea name="classified_content" class="mytextarea">{!! $param['classified']->classified_content !!}</textarea>
                                        @if( $errors->count()>0 && $errors->has('classified_content'))
                                            <span class="text-danger">{{$errors->first('classified_content')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6 pl-30 pr-30">
                                    <div class="form-group">
                                        <label>Số phòng ngủ</label>
                                        <select name="num_bed" id="" class="custom-select2 form-control">
                                            @foreach( $param['num_bed'] as $i)
                                                <option {{$param['classified']->num_bed==$i->id?"selected":null }} value="{{$i->id}}" >{{$i->param_name}}</option>
                                            @endforeach
                                        </select>
                                        @if( $errors->count()>0 && $errors->has('num_bed'))
                                            <span class="text-danger">{{$errors->first('num_bed')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6 pl-30 pr-30">
                                    <div class="form-group">
                                        <label>Số phòng vệ sinh</label>
                                        <select name="num_toi" id="" class="custom-select2 form-control">
                                            @foreach( $param['num_toi'] as $i)
                                                <option {{$param['classified']->num_toi==$i->id?"selected":null }} value="{{$i->id}}" >{{$i->param_name}}</option>
                                            @endforeach
                                        </select>
                                        @if( $errors->count()>0 && $errors->has('num_toi'))
                                            <span class="text-danger">{{$errors->first('num_toi')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-4 pl-30">
                                    <div class="form-group">
                                        <label>Giá</label>
                                        <div class="row">
                                            <div class="col-8 pr-0">
                                                <input name="classified_price" class="form-control" value="{{$param['classified']->classified_price}}">
                                                @if( $errors->count()>0 && $errors->has('classified_price'))
                                                    <span class="text-danger">{{$errors->first('classified_price')}}</span>
                                                @endif
                                            </div>
                                            <div class="col-4 p-0">
                                                <select name="price_type" class="form-control">
                                                    @foreach( $param['price'] as $i)
                                                        <option value="{{$i->id}}" {{$i->id ==$param['classified']->price_type?"selected":null}}>{{$i->unit_name}}</option>
                                                    @endforeach
                                                </select>
                                                @if( $errors->count()>0 && $errors->has('price_type'))
                                                    <span class="text-danger">{{$errors->first('price_type')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 pl-30">
                                    <div class="form-group">
                                        <label>Diện tích</label>
                                        <div class="row">
                                            <div class="col-8 pr-0">
                                                <input name="classified_area" class="form-control" value="{{$param['classified']->classified_area}}">
                                                @if( $errors->count()>0 && $errors->has('classified_area'))
                                                    <span class="text-danger">{{$errors->first('classified_area')}}</span>
                                                @endif
                                            </div>
                                            <div class="col-4 p-0">
                                                <select name="area_type" class="form-control">
                                                    @foreach( $param['area'] as $i)
                                                        <option value="{{$i->id}}" {{$i->id == $param['classified']->area_type?"selected":null}}>{{$i->unit_name}}</option>
                                                    @endforeach
                                                </select>
                                                @if( $errors->count()>0 && $errors->has('area_type'))
                                                    <span class="text-danger">{{$errors->first('area_type')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 pl-30">
                                    <div class="form-group">
                                        <label>Hình ảnh</label>
                                        <div class="main-image_preview">
                                            <div class="input-upload">
                                                <label for="input_image">
                                                    <img i class="" src="{{asset('System/Icons/upload.png')}}">
                                                    <p>Tải ảnh lên</p>
                                                    @if( $errors->count()>0 && $errors->has('classified_image'))
                                                        <span class="text-danger">{{$errors->first('classified_image')}}</span>
                                                    @endif
                                                </label>
                                                <input type="file" name="classified_image[]" id="input_image" onchange="previewMutiple(event)" multiple="multiple" >
                                            </div>
                                            <div class="preview_image" id="preview_image">
                                            </div>
                                            <div class="preview_image " id="old">
                                                @foreach(json_decode($param['classified']->classified_image) as $i)
                                                    <img src="{{asset($i)}}">
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success text-center">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('Script')
    <script src="{{asset('System/param.js')}}"></script>
    <script>
        $(document).ready(function (){
            var district ='{{$param['classified']->district_id}}';
            get_district('#province_id','#district_id','{{route('param.district','')}}',district);
            setTimeout(()=>{
                get_ward('#district_id','#ward_id','{{route('param.ward','')}}','{{$param['classified']->ward_id}}');
            },1000)
        });
    </script>
    <script>

        function previewMutiple(event){
            var input = document.getElementById("input_image");
            $('#old').hide();

            var preview = input.files.length;
            document.getElementById("preview_image").innerHTML ='';
            for(i = 0; i < preview; i++){
                var urls = URL.createObjectURL(event.target.files[i]);
                document.getElementById("preview_image").innerHTML += '<img src="'+urls+'">';
            }
        }
    </script>

@endsection

@section('Style')
    <style>
        .main-image_preview{
            padding: 4px;
            width: 100%;
            max-height: 200px;
            display: flex;
            border: 1px solid black;
        }
        .input-upload label img{
            height: 100%;
            max-height: 90px;
            object-fit: cover;
        }
        .input-upload{
            border: 1px solid black;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 25%;
            height: 100%;
        }
        .input-upload p{
            color: #00bcf2;
            font-weight: 700;
        }
        .input-upload input{
            opacity: 0;
            height: 0px;
        }
        .preview_image {
            padding-left: 20px;
            display: flex;
            overflow: auto;
        }
        .preview_image img {
            height: 100%;
            max-height: 140px;
            margin-left: 5px;
        }
    </style>
@endsection
