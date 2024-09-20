@extends('Admin.Layouts.Master')
@section('Title','Chỉnh sửa dự án')
@section('Content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Chỉnh sửa</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa</li>
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
                                    <label>Tên dự án</label>
                                    <input name="project_name" type="text"  class="form-control" value="{{$item['project']->project_name}}">
                                    @if( $errors->count()>0 && $errors->has('project_name'))
                                        <span class="text-danger">{{$errors->first('project_name')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-4 pr-30">
                                <div class="form-group">
                                    <label>Chuyên mục</label>
                                 <select name="group_id" class="custom-select2 form-control">
                                     @foreach($item['group']->where('parent_id','<>',null) as $i)
                                         <option value="{{$i->id}}" {{$i->id == $item['project']->group_id?"selected":null}}>{{$i->group_name}}</option>
                                     @endforeach

                                 </select>
                                    @if( $errors->count()>0 && $errors->has('group_id'))
                                        <span class="text-danger">{{$errors->first('group_id')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-3 pl-30">
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                        <input name="project_address" class="form-control" value="{{old('project_address')??$item['project']->project_address}}">
                                        @if( $errors->count()>0 && $errors->has('project_address'))
                                            <span class="text-danger">{{$errors->first('project_address')}}</span>
                                        @endif
                                </div>
                            </div>
                            <div class="col-3 pl-30">
                                <div class="form-group">
                                    <label>Tỉnh/Thành phố</label>
                                    <select name="province_id" id="province_id" onchange="get_district(this,'#district_id','{{route('param.district','')}}')" class="form-control">
                                        @foreach( $item['province'] as $i)
                                            <option {{$item['project']->province_id==$i->id?"selected":null }} value="{{$i->id}}" >{{$i->province_name}}</option>
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
                                    </select>
                                    @if( $errors->count()>0 && $errors->has('ward_id'))
                                        <span class="text-danger">{{$errors->first('ward_id')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12  pl-30">
                                <div class="form-group">
                                    <label>Nội dung</label>
                                    <textarea name="project_content" class="mytextarea">{!! $item['project']->project_content !!}</textarea>
                                    @if( $errors->count()>0 && $errors->has('project_content'))
                                    <span class="text-danger">{{$errors->first('project_content')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-4 pl-30">
                                <div class="form-group">
                                    <label>Tổng đầu tư</label>
                                    <div class="row">
                                        <div class="col-8 pr-0">
                                            <input name="project_price" class="form-control" value="{{$item['project']->project_price}}">
                                            @if( $errors->count()>0 && $errors->has('project_price'))
                                                <span class="text-danger">{{$errors->first('project_price')}}</span>
                                            @endif
                                        </div>
                                        <div class="col-4 p-0">
                                            <select name="price_type" class="form-control">
                                                @foreach( $item['price'] as $i)
                                                <option value="{{$i->id}}" {{$i->id == $item['project']->price_type?"selected":null}}>{{$i->unit_name}}</option>
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
                                    <label>Tổng diện tích</label>
                                    <div class="row">
                                        <div class="col-8 pr-0">
                                            <input name="project_area" class="form-control" value="{{$item['project']->project_area}}">
                                            @if( $errors->count()>0 && $errors->has('project_area'))
                                                <span class="text-danger">{{$errors->first('project_area')}}</span>
                                            @endif
                                        </div>
                                        <div class="col-4 p-0">
                                            <select name="area_type" class="form-control">
                                                @foreach( $item['area'] as $i)
                                                    <option value="{{$i->id}}" {{$i->id == $item['project']->area_type?"selected":null}}>{{$i->unit_name}}</option>
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
                                                @if( $errors->count()>0 && $errors->has('project_image'))
                                                    <span class="text-danger">{{$errors->first('project_image')}}</span>
                                                @endif
                                            </label>
                                            <input type="file" name="project_image[]" id="input_image" onchange="previewMutiple(event)" multiple="multiple" >
                                        </div>
                                        <div class="preview_image" id="preview_image">
                                        </div>
                                        <div class="preview_image " id="old">

                                            @foreach(json_decode( $item['project']->project_image) as $i)
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
    $(document).ready(function (){
    var district ='{{$item['project']->district_id}}';
    get_district('#province_id','#district_id','{{route('param.district','')}}',district);
 setTimeout(()=>{
     get_ward('#district_id','#ward_id','{{route('param.ward','')}}','{{$item['project']->ward_id}}');

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
