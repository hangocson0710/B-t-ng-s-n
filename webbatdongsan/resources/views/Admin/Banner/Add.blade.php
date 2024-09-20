@extends('Admin.Layouts.Master')
@section('Title','Thêm tin tức')
@section('Content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Thêm banner</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thêm</li>
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
                                <div class="col-12 pl-30">

                                        <div style="border: 1px solid black;padding: 5px;height: 320px">
                                            <label for="input-img" style="margin:0 auto;margin-bottom: 10px;width: 100%;">
                                                <p class="text-danger">Chọn ảnh</p>
                                                <div class="author-img" id="old" style="text-align: center;height: 260px;margin: 0 auto;max-height: 278px;">
{{--                                                    <img  src="" alt="Author Image">--}}
                                                </div>
                                                <div style="display: none;text-align: center;height: 260px;margin: 0 auto;max-height: 278px;" id="preview-img">

                                                </div>
                                                @if( $errors->count()>0 && $errors->has('banner_image'))
                                                    <span class="text-danger">{{$errors->first('banner_image')}}</span>
                                                @endif
                                            </label>
                                            <input id="input-img" name="banner_image" onchange="previewMutiple(event)" style="position: absolute;opacity: 0" type="file">
                                        </div>

                                </div>
                                <div class="col-8  pl-30">
                                    <div class="form-group">
                                        <label>Đường dẫn quảng cáo</label>
                                        <input name="banner_link" type="text"  class="form-control" value="">
                                        @if( $errors->count()>0 && $errors->has('banner_link'))
                                            <span class="text-danger">{{$errors->first('banner_link')}}</span>
                                        @endif
                                    </div>
                                </div>


                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success text-center">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
                {{--            @php--}}
                {{--            dd($item);--}}
                {{--            @endphp--}}

            </div>
        </div>
    </div>
@endsection
@section('Script')
    <script src="{{asset('System/Admin/vendors/scripts/datatable-setting.js')}}"></script>
    <script src="{{asset('System/param.js')}}"></script>
    <script>
        {{--   $(document).ready(function (){--}}
        {{--   var district ='{{$item['project']->location->district_id}}';--}}
        {{--   get_district('#province_id','#district_id','{{route('param.district','')}}',district);--}}
        {{--setTimeout(()=>{--}}
        {{--    get_ward('#district_id','#ward_id','{{route('param.ward','')}}','{{$item['project']->location->ward_id}}');--}}

        {{--},1000)--}}
        {{--   });--}}
    </script>
    <script>

        function previewMutiple(event){
            var input = document.getElementById("input-img");
            $('#old').hide();
            var preview = input.files.length;
            document.getElementById("preview-img").innerHTML ='';
            var urls = URL.createObjectURL(event.target.files[0]);
            $('#preview-img').show();
            document.getElementById("preview-img").innerHTML += '<img style="height: 100%" src="'+urls+'">';
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
