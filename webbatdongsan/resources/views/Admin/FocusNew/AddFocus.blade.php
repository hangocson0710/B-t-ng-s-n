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
                                <h4>Thêm tin tức</h4>
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
                            <div class="col-8  pl-30">
                                <div class="form-group">
                                    <label>Tiêu đề</label>
                                    <input name="news_title" type="text"  class="form-control" value="">
                                    @if( $errors->count()>0 && $errors->has('news_title'))
                                        <span class="text-danger">{{$errors->first('news_title')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-4 pr-30">
                                <div class="form-group">
                                    <label>Chuyên mục</label>
                                 <select name="group_id" class="custom-select2 form-control">
                                     @foreach($param['group']->where('parent_id','<>',null) as $i)
                                         <option value="{{$i->id}}" {{$i->id == old('group_id')?"selected":null}}>{{$i->group_name}}</option>
                                     @endforeach

                                 </select>
                                    @if( $errors->count()>0 && $errors->has('group_id'))
                                        <span class="text-danger">{{$errors->first('group_id')}}</span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-12  pl-30">
                                <div class="form-group">
                                    <label>Nội dung</label>
                                    <textarea name="news_content" class="mytextarea"></textarea>
                                    @if( $errors->count()>0 && $errors->has('news_content'))
                                    <span class="text-danger">{{$errors->first('news_content')}}</span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-12 pl-30">
                                <div class="form-group">
                                    <label>Ảnh đại diện</label>
                                    <div style="border: 1px solid black;padding: 5px;height: 200px">
                                        <label for="input-img" style="margin:0 auto;margin-bottom: 10px">
                                            <p class="text-danger">Chọn ảnh</p>
                                            <div class="author-img" id="old" style="width: 150px;height: 150px;margin:0 auto;margin-bottom: 10px ;">
{{--                                                <img  src="" alt="Author Image">--}}
                                            </div>
                                            <div style="width: 150px;display: none;height: 150px" id="preview-img">

                                            </div>
                                            @if( $errors->count()>0 && $errors->has('avatar'))
                                                <span class="text-danger">{{$errors->first('avatar')}}</span>
                                            @endif
                                        </label>
                                        <input id="input-img" name="news_image" onchange="previewMutiple(event)" style="position: absolute;opacity: 0" type="file">
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
        document.getElementById("preview-img").innerHTML += '<img src="'+urls+'">';
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
