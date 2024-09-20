@section('Title', 'Dự án')
@extends('Home.Layouts.Master')
@section('Content')
    <!-- BREADCRUMB AREA START -->
    <div class="text-left bg-overlay-white-30 bg-image mb-5" data-bs-bg="img/bg/14.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="{{ route('trang-chu') }}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>{{ $param['group_first']->group_name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- PRODUCT DETAILS AREA START -->
    <div class="ltn__product-area ltn__product-gutter mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="ltn__shop-options">
                        <ul class="justify-content-start">
                            <li>
                                <div class="ltn__grid-list-tab-menu">
                                    <div class="nav">
                                        <a class="active show" data-bs-toggle="tab" href="#liton_product_grid"><i class="fas fa-th-large"></i></a>
                                        <a data-bs-toggle="tab" href="#liton_product_list"><i class="fas fa-list"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="d-none">
                                <div class="showing-product-number text-right">
                                    <span>Showing 1–12 of 18 results</span>
                                </div>
                            </li>
                            <li>
                                <div class="short-by text-center">
                                    <form action="" method="get">
                                        <select name="items" onchange="this.form.submit()" class="nice-select">
                                            <option {{ request()->items == 10 ? "selected" : "" }} value="10">Số tin : 10</option>
                                            <option {{ request()->items == 15 ? "selected" : "" }} value="15">Số tin : 15</option>
                                            <option {{ request()->items == 20 ? "selected" : "" }} value="20">Số tin : 20</option>
                                            <option {{ request()->items == 25 ? "selected" : "" }} value="25">Số tin : 25</option>
                                        </select>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row">
                                <div class="col-lg-12">
                                        <!-- Search Widget -->
                                        <div class="ltn__search-widget mb-30">
                                            <form action="" method="get">
                                                <input type="text" name="search" id="keywords" placeholder="Tìm kiếm theo từ khóa, địa chỉ, giá...">
                                                <div id="search_ajax"></div>
                                                {{ csrf_field() }}
                                                <button type="submit"><i class="fas fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    @forelse($param['project'] as $item)
                                        <div class="col-xl-6 col-sm-6 col-12">
                                            <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                                                <div class="product-img" style="max-height: 250px; height: 250px;">
                                                    <a style="height: 100%" href="{{ route('chi-tiet-du-an', $item->project_url) }}">
                                                        <img style="object-fit: cover" class="w-100 h-100" src="{{ asset(json_decode($item->project_image)[0]) }}" alt="#"></a>
                                                    <div class="real-estate-agent">
                                                        <div class="agent-img">
                                                            <a href="team-details.html"><img src="{{ asset($item->user->avatar) }}" alt="#"></a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product-info">
                                                    <div class="product-badge">
                                                        <ul>
                                                            <li class="sale-badg">DỰ ÁN</li>
                                                            @if($item->vip ==1)
                                                                <span class="badge-secondary text-danger  badge ">TIN VIP </span>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                    <h2 class="product-title"><a href="{{ route('chi-tiet-du-an', $item->project_url) }}">{{ $item->project_name }}</a></h2>
                                                    <div class="product-img-location">
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:void(0)"><i class="flaticon-pin"></i>{{ $item->project_address }}, {{ $item->ward_name }}, {{ $item->district_name }}, {{ $item->province_name }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                                        <li><span>{{ $item->project_area }}</span>
                                                            {{ $item->area->unit_name }}
                                                        </li>
                                                    </ul>
                                                    <div class="product-hover-action">
                                                        <ul>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product-info-bottom">
                                                    <div class="product-price">
                                                        <span>{{ number_format($item->project_price, 0, '', ',') }} <label>{{ $item->price->unit_name }}</label></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p>Chưa có dữ liệu</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_product_list">
                            <div class="ltn__product-tab-content-inner ltn__product-list-view">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Search Widget -->
                                        <div class="ltn__search-widget mb-30">
                                            <form action="#">
                                                <input type="text" name="search" placeholder="Tìm kiếm theo từ khóa...">
                                                <button type="submit"><i class="fas fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    {{-- @foreach($param['project'] as $item)
                                        <x-home.classified.item-row :item="$item"></x-home.classified.item-row>
                                    @endforeach --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ $param['project']->render('Home.Layouts.Paginate') }}
                </div>
                <div class="col-lg-4 pt-50">
                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar pt-5">
                        <div class="widget pt-5 ltn__menu-widget ltn__menu-widget-2--- ltn__menu-widget-2-color-2---">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">Danh mục</h4>
                            <ul>
                                @foreach($param['group'] as $i)
                                    <li><a href="{{ route('danh-sach-du-an', $i->group_url) }}">{{ $i->group_name }} <span>({{ $i->group_project->where('is_deleted', 0)->where('is_show', 1)->where('is_active', 1)->count() }})</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#keywords').keyup(function() {
                var query = $(this).val();
                if (query != '') {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('autocomplete_ajax_project') }}",
                        method: "POST",
                        data: {
                            query: query,
                            _token: _token
                        },
                        success: function(data) {
                            $('#search_ajax').fadeIn();
                            $('#search_ajax').html(data);
                        }
                    });
                } else {
                    $('#search_ajax').fadeOut();
                }
            });

            $(document).on('click', 'li', function() {
                $('#keywords').val($(this).text());
                $('#search_ajax').fadeOut();
            });
        });
    </script>
<style>

#search_ajax, #search_ajax_list {
        position: absolute;
        width: 100%;
        background: white;
        border: 1px solid #ddd;
        border-top: none;
        z-index: 1000;
        max-height: 200px;
        overflow-y: auto;
    }

    #search_ajax li, #search_ajax_list li {
        padding: 10px;
        cursor: pointer;
        list-style: none;
    }

    #search_ajax li:hover, #search_ajax_list li:hover {
        background: #f96332;
        color: white;
    }
</style>
@endsection
