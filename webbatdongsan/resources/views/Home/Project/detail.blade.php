@extends('Home.Layouts.Master')
@section('Title', $project->project_name)
@section('Content')
    <div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image" data-bg="img/bg/14.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="{{ route('trang-chu') }}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li class="active">{{ $project->project_name }}</li>
                        </ul>
                    </div>
                    <h1 class="mt-5">{{ $project->project_name }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="ltn__product-area ltn__product-gutter mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="ltn__product-slider-area ltn__product-gutter">
                        <div class="ltn__product-slider-active slick-arrow-1">
                            @foreach(json_decode($project->project_image) as $image)
                                <div class="ltn__product-item ltn__product-item-4 text-center">
                                    <div class="product-img">
                                        <a href="{{ asset($image) }}" data-fancybox="gallery">
                                            <img src="{{ asset($image) }}" alt="{{ $project->project_name }}">
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="ltn__shop-details-area pb-60">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="ltn__shop-details-inner ltn__page-details-inner mb-60">
                                        <h2 class="ltn__title">{{ $project->project_name }}</h2>
                                        <div class="ltn__page-details-inner-tab">
                                            <div class="ltn__tab-menu ltn__tab-menu-top-right ltn__tab-menu-2 ltn__tab-menu-border">
                                                <div class="nav">
                                                    <a class="active show" data-bs-toggle="tab" href="#liton_tab_details_1_1">Mô tả</a>
                                                </div>
                                            </div>
                                            <div class="tab-content">
                                                <div class="tab-pane fade active show" id="liton_tab_details_1_1">
                                                    <div class="ltn__tab-content-inner">
                                                        <p>{!! $project->project_content !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__social-media">
                                            <ul>
                                                <li>Chia sẻ:</li>
                                                <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                                <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ltn__tab-content-inner">
                        <h4 class="title-2">Chi tiết dự án</h4>
                        <ul>
                            <li><strong>Tổng đầu tư:</strong> {{ number_format($project->project_price, 0, '', ',') }} {{ $project->price->unit_name }}</li>
                            <li><strong>Diện tích:</strong> {{ $project->project_area }} {{ $project->area->unit_name }}</li>
                            <li><strong>Địa chỉ:</strong> {{ $project->project_address }}, {{ $project->ward->ward_name }}, {{ $project->district->district_name }}, {{ $project->province->province_name }}</li>
                            <li><strong>Ngày tạo:</strong> {{ date('d-m-Y', $project->created_at) }}</li>
                            <li><strong>Người tạo:</strong> {{ $project->user->username }}</li>
                        </ul>
                    </div>
                    <div class="ltn__tab-content-inner">
                    <h4 class="title-2">Bất động sản thuộc dự án</h4>
                    <ul>
                        @foreach($classifieds as $classified)
                        <li><a href="{{ route('chi-tiet-tin', $classified->classified_url) }}">{{ $classified->classified_title }}</a></li>
                        @endforeach
                    </ul>
                </div>
                </div>
                
                <div class="col-lg-4">
                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                        <div class="widget ltn__menu-widget ltn__menu-widget-2--- ltn__menu-widget-2-color-2---">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">Danh mục</h4>
                            <ul>
                                @foreach($param['group'] as $i)
                                    <li><a href="{{ route('danh-sach-du-an', $i->group_url) }}">{{ $i->group_name }} <span>({{ $i->group_project->count() }})</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection
    
