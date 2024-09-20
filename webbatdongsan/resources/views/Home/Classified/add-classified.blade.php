@extends('Home.Layouts.Master')
@section('Content')
    <div class="ltn__slider-area ltn__slider-3 section-bg-1">
        <div class="container">
            <h1 class="section-title text-center">Đăng bài viết</h1>
            <div class="card-box mb-30 pt-30">
                <form action="" method="post" enctype="multipart/form-data" multiple="multiple">
                    @csrf
                    <div class="pb-20">
                        <div class="row">
                            <div class="col-8 pl-30">
                                <div class="form-group">
                                    <label>Tiêu đề tin</label>
                                    <input name="classified_title" type="text" class="form-control" value="{{old('classified_title') ?? ''}}">
                                    @if($errors->has('classified_title'))
                                        <span class="text-danger">{{$errors->first('classified_title')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-4 pr-30">
                                <div class="input-item">
                                    <label>Chuyên mục</label>
                                    <select name="group_id" class="nice-select">
                                        @foreach($item['group']->where('parent_id', '<>', null) as $i)
                                            <option value="{{$i->id}}" {{old('group_id') == $i->id ? 'selected' : ''}}>{{$i->group_name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('group_id'))
                                        <span class="text-danger">{{$errors->first('group_id')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 pl-30">
                                <div class="input-item">
                                    <label>Thuộc dự án</label>
                                    <select name="project_id" class="nice-select">
                                        <option value="">---</option>
                                        @foreach($item['project'] as $i)
                                            <option value="{{$i->id}}" {{old('project_id') == $i->id ? 'selected' : ''}}>{{$i->project_name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('project_id'))
                                        <span class="text-danger">{{$errors->first('project_id')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-3 pl-30">
                                <div class="input-item">
                                    <label>Địa chỉ</label>
                                    <input name="classified_address" type="text" class="form-control" value="{{old('classified_address') ?? ''}}">
                                    @if($errors->has('classified_address'))
                                        <span class="text-danger">{{$errors->first('classified_address')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-3 pl-30">
                                <div class="input-item">
                                    <label>Tỉnh/thành phố</label>
                                    <select name="province_id" id="province_id" onchange="get_district(this, '#district_id', '{{route('param.district', '')}}', null, null)" class="nice-select">
                                        @foreach($item['province'] as $i)
                                            <option value="{{$i->id}}" {{old('province_id') == $i->id ? 'selected' : ''}}>{{$i->province_name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('province_id'))
                                        <span class="text-danger">{{$errors->first('province_id')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-3 pl-30">
                                <div class="input-item">
                                    <label>Quận/huyện</label>
                                    <select name="district_id" id="district_id" onchange="get_ward(this, '#ward_id', '{{ route('param.ward', '') }}', null, null)" class="nice-select">
                                        <option value="">Chọn----</option>
                                        @foreach($item['district'] as $district)
                                            <option value="{{ $district->id }}" {{ old('district_id') == $district->id ? 'selected' : '' }}>{{ $district->district_name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('district_id'))
                                        <span class="text-danger">{{$errors->first('district_id')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-3 pl-30">
                                <div class="input-item">
                                    <label>Xã/phường</label>
                                    <select name="ward_id" id="ward_id" class="nice-select">
                                        <option value="">Chọn----</option>
                                       {{-- @foreach($item['ward'] as $ward)
                                            <option value="{{ $ward->id }}" {{ old('ward_id') == $ward->id ? 'selected' : '' }}>{{ $ward->ward_name }}</option>
                                        @endforeach--}}
                                    </select>
                                    @if($errors->has('ward_id'))
                                        <span class="text-danger">{{$errors->first('ward_id')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 pl-30">
                                <div class="form-group">
                                    <label>Nội dung</label>
                                    <textarea name="classified_content" class="mytextarea">{{old('classified_content') ?? ''}}</textarea>
                                    @if($errors->has('classified_content'))
                                        <span class="text-danger">{{$errors->first('classified_content')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-4 pl-30">
                                <div class="form-group">
                                    <label>Giá</label>
                                    <div class="row">
                                        <div class="col-8 pr-0">
                                            {{--oninvalid="this.setCustomValidity('Giá trị phải lớn hơn hoặc bằng 0.')" 
       oninput="this.setCustomValidity('')"--}}
                                            <input name="classified_price" type="number" min="0" class="form-control" value="{{old('classified_price')}}">
                                            @if($errors->has('classified_price'))
                                                <span class="text-danger">{{$errors->first('classified_price')}}</span>
                                            @endif
                                        </div>
                                        <div class="col-4 p-0">
                                            <select name="price_type" class="form-control">
                                                @foreach($item['price'] as $i)
                                                    <option value="{{$i->id}}" {{old('price_type') == $i->id ? 'selected' : null}}>{{$i->unit_name}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('price_type'))
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
                                            <input name="classified_area" type="number" min="0" class="form-control" value="{{old('classified_area')}}">
                                            @if($errors->has('classified_area'))
                                                <span class="text-danger">{{$errors->first('classified_area')}}</span>
                                            @endif
                                        </div>
                                        <div class="col-4 p-0">
                                            <select name="area_type" class="form-control">
                                                @foreach($item['area'] as $i)
                                                    <option value="{{$i->id}}" {{old('area_type') == $i->id ? 'selected' : null}}>{{$i->unit_name}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('area_type'))
                                                <span class="text-danger">{{$errors->first('area_type')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4"></div>
                            <div class="col-4 pl-30">
                                <div class="form-group">
                                    <label>Số phòng ngủ</label>
                                    <select name="num_bed" class="form-control">
                                        @foreach($item['num_bed'] as $i)
                                            <option value="{{$i->id}}" {{old('num_bed') == $i->id ? 'selected' : null}}>{{$i->param_name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('num_bed'))
                                        <span class="text-danger">{{$errors->first('num_bed')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-4 pl-30">
                                <div class="form-group">
                                    <label>Số phòng vệ sinh</label>
                                    <select name="num_toi" class="form-control">
                                        @foreach($item['num_toi'] as $i)
                                            <option value="{{$i->id}}" {{old('num_toi') == $i->id ? 'selected' : null}}>{{$i->param_name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('num_toi'))
                                        <span class="text-danger">{{$errors->first('num_toi')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-4 pl-30">
                                <div class="form-group">
                                <label>Tin vip</label>
                                    <input name="is_vip" id="is_vip" type="checkbox" data-price="{{$config_price->price_vip}}" {{Auth::user()->coin_amount<$config_price->price_vip?"disabled":null}} class="form-check">
                                    @if(Auth::user()->coin_amount<$config_price->price_vip)
                                    <span class="text-danger">Số dư của bạn không đủ </span>
                                    @endif
                                    <p>(Tin vip :  {{$config_price->price_vip}} Coin)</p>
                                            @if( $errors->count()>0 && $errors->has('is_vip'))
                                                <span class="text-danger">{{$errors->first('is_vip')}}</span>
                                            @endif
                                </div>
                            </div>
                            <div class="col-12 pl-30">
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <div class="main-image_preview">
                                        <div class="input-upload">
                                            <label for="input_image">
                                                <img class="" src="{{asset('System/Icons/upload.png')}}">
                                                <p>Tải ảnh lên</p>
                                                @if($errors->has('classified_image'))
                                                    <span class="text-danger">{{$errors->first('classified_image')}}</span>
                                                @endif
                                            </label>
                                            <input type="file" name="classified_image[]" id="input_image" onchange="previewMutiple(event)" multiple="multiple">
                                        </div>
                                        <div class="preview_image" id="preview_image"></div>
                                        <div class="preview_image" id="old">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn mt-4 btn-success text-center">Lưu</button>
                            <p class="total_price">(Giá : {{$config_price->price}} Coin)</p>
                            <h6>Số coin hiện có {{\Illuminate\Support\Facades\Auth::user()->coin_amount}}</h6>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('Script')
    <script src="{{asset('System/param.js')}}"></script>
<script>
    $('input[type=checkbox]').click(function() {
        if($(this).is(':checked')) {
           $('.total_price').empty();
           $('.total_price').append("(Giá : {{$config_price->price_vip}} Coin)");
        } else {
            $('.total_price').empty();
            $('.total_price').append("(Giá : {{$config_price->price}} Coin)");
        }
    });
</script>
    <script>
        function previewMutiple(event){
            var input = document.getElementById("input_image");
            $('#old').hide();
            var preview = input.files.length;
            document.getElementById("preview_image").innerHTML ='';
            for (i = 0; i < preview; i++) {
                var urls = URL.createObjectURL(event.target.files[i]);
                document.getElementById("preview_image").innerHTML += '<img src="'+urls+'">';
            }
        }
    </script>
@endsection

@section('Style')
    <style>
        .main-image_preview {
            padding: 4px;
            width: 100%;
            max-height: 200px;
            display: flex;
            border: 1px solid black;
        }
        .input-upload label img {
            height: 100%;
            max-height: 90px;
            object-fit: cover;
        }
        .input-upload {
            border: 1px solid black;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 25%;
            height: 100%;
        }
        .input-upload p {
            color: #00bcf2;
            font-weight: 700;
        }
        .input-upload input {
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
