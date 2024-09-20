@extends('Admin.Layouts.Master')
@section('Title','Xem bài viết')
@section('Content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Chi tiết Bài Viết</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.classified.list') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Chi tiết Bài Viết</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="card-box mb-30 pt-30">
                    <div class="pb-20">
                        @if ($item['classified'])
                        <div class="row">
                            <div class="col-8  pl-30">
                                <div class="form-group">
                                    <label>Tiêu đề bài viết</label>
                                    <p>{{ $item['classified']->classified_title }}</p>
                                </div>
                            </div>
                            <div class="col-4 pr-30">
                                <div class="form-group">
                                    <label>Chuyên mục</label>
                                    <p>{{ optional($item['classified']->group)->group_name }}</p>
                                </div>
                            </div>
                            <div class="col-8  pl-30">
                                <div class="form-group">
                                    <label>Dự án</label>
                                    <p>{{ optional($item['classified']->project)->project_name }}</p>
                                </div>
                            </div>
                            <div class="col-3 pl-30">
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <p>{{ $item['classified']->classified_address }}</p>
                                </div>
                            </div>
                            <div class="col-3 pl-30">
                                <div class="form-group">
                                    <label>Tỉnh/Thành phố</label>
                                    <p>{{ optional($item['classified']->province)->province_name }}</p>
                                </div>
                            </div>
                            <div class="col-3 pl-30">
                                <div class="form-group">
                                    <label>Quận/Huyện</label>
                                    <p>{{ optional($item['classified']->district)->district_name }}</p>
                                </div>
                            </div>
                            <div class="col-3 pl-30">
                                <div class="form-group">
                                    <label>Xã/Phường</label>
                                    <p>{{ optional($item['classified']->ward)->ward_name }}</p>
                                </div>
                            </div>
                            <div class="col-12  pl-30">
                                <div class="form-group">
                                    <label>Nội dung</label>
                                    <p>{!! $item['classified']->classified_content !!}</p>
                                </div>
                            </div>
                            <div class="col-4 pl-30">
                                <div class="form-group">
                                    <label>Giá</label>
                                    <p>{{ $item['classified']->classified_price }} {{ optional($item['classified']->priceType)->unit_name }}</p>
                                </div>
                            </div>
                            <div class="col-4 pl-30">
                                <div class="form-group">
                                    <label>Diện tích</label>
                                    <p>{{ $item['classified']->classified_area }} {{ optional($item['classified']->areaType)->unit_name }}</p>
                                </div>
                            </div>
                            <div class="col-12 pl-30">
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <div class="main-image_preview">
                                        @foreach(json_decode($item['classified']->classified_image) as $image)
                                            <img src="{{ asset($image) }}" alt="classified image">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('admin.classified.edit', $item['classified']->id) }}" class="btn btn-primary">Chỉnh sửa</a>
                        </div>
                        @else
                            <p class="text-center">Bài viết không tồn tại</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('Style')
<style>
.main-image_preview {
    padding: 4px;
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    border: 1px solid black;
}
.main-image_preview img {
    height: 100px;
    object-fit: cover;
}
</style>
@endsection
