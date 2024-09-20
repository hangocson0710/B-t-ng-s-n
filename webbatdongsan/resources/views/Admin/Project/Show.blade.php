@extends('Admin.Layouts.Master')
@section('Title','Xem dự án')
@section('Content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Chi tiết Dự Án</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.project.list') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Chi tiết Dự Án</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="card-box mb-30 pt-30">
                    <div class="pb-20">
                        <div class="row">
                            <div class="col-8  pl-30">
                                <div class="form-group">
                                    <label>Tên dự án</label>
                                    <p>{{ $item['project']->project_name }}</p>
                                </div>
                            </div>
                            <div class="col-4 pr-30">
                                <div class="form-group">
                                    <label>Chuyên mục</label>
                                    <p>{{ $item['group']->where('id', $item['project']->group_id)->first()->group_name }}</p>
                                </div>
                            </div>
                            <div class="col-3 pl-30">
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <p>{{ $item['project']->project_address }}</p>
                                </div>
                            </div>
                            <div class="col-3 pl-30">
                                <div class="form-group">
                                    <label>Tỉnh/Thành phố</label>
                                    <p>{{ optional($item['province']->where('id', $item['project']->province_id)->first())->province_name }}</p>
                                </div>
                            </div>
                            <div class="col-3 pl-30">
                                <div class="form-group">
                                    <label>Quận/Huyện</label>
                                    <p>{{ optional($item['project']->district)->district_name }}</p>
                                </div>
                            </div>
                            <div class="col-3 pl-30">
                                <div class="form-group">
                                    <label>Xã/Phường</label>
                                    <p>{{ optional($item['project']->ward)->ward_name }}</p>
                                </div>
                            </div>
                            <div class="col-12  pl-30">
                                <div class="form-group">
                                    <label>Nội dung</label>
                                    <p>{!! $item['project']->project_content !!}</p>
                                </div>
                            </div>
                            <div class="col-4 pl-30">
                                <div class="form-group">
                                    <label>Tổng đầu tư</label>
                                    <p>{{ $item['project']->project_price }} {{ optional($item['price']->where('id', $item['project']->price_type)->first())->unit_name }}</p>
                                </div>
                            </div>
                            <div class="col-4 pl-30">
                                <div class="form-group">
                                    <label>Tổng diện tích</label>
                                    <p>{{ $item['project']->project_area }} {{ optional($item['area']->where('id', $item['project']->area_type)->first())->unit_name }}</p>
                                </div>
                            </div>
                            <div class="col-12 pl-30">
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <div class="main-image_preview">
                                        @foreach(json_decode($item['project']->project_image) as $image)
                                            <img src="{{ asset($image) }}" alt="project image">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('admin.project.edit', $item['project']->id) }}" class="btn btn-primary">Chỉnh sửa</a>
                        </div>
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
