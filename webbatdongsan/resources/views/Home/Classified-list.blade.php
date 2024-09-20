@section('Title','Trang đăng tin')
@extends('Home.Layouts.Master')
@section('Content')
    <!-- BREADCRUMB AREA START -->
    <div class=" text-left bg-overlay-white-30 bg-image mb-5"  data-bs-bg="img/bg/14.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            
                            <li><a href="index.html"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>{{ $param['group_first']->group_name}}</li>
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
{{--                            <li>--}}
{{--                                <div class="short-by text-center">--}}
{{--                                    <select class="nice-select">--}}
{{--                                        <option>Default Sorting</option>--}}
{{--                                        <option>Sort by popularity</option>--}}
{{--                                        <option>Sort by new arrivals</option>--}}
{{--                                        <option>Sort by price: low to high</option>--}}
{{--                                        <option>Sort by price: high to low</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </li>--}}
                            <li>
                                <div class="short-by text-center">
                                    <form action="" method="get">
                                    <select name="items" onchange="this.form.submit()" class="nice-select">
                                        <option {{request()->items == 10?"selected":""}} value="10">Số tin : 10</option>
                                        <option {{request()->items == 15?"selected":""}} value="15">Số tin : 15</option>
                                        <option {{request()->items == 20?"selected":""}} value="20">Số tin : 20</option>
                                        <option {{request()->items == 25?"selected":""}} value="25">Số tin : 25</option>
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
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="text" name="search" id="keywords" class="form-control" placeholder="Tìm kiếm theo từ khóa, địa chỉ, giá...">
                                                    <!-- <div id="search_ajax"></div> -->
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <input type="number" name="min_price" class="form-control" placeholder="Giá tối thiểu" min="0">
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <input type="number" name="max_price" class="form-control" placeholder="Giá tối đa" min="0">
                                                </div>
                                                <div class="col-md-12 mt-3 text-center">
                                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Tìm kiếm</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                    <!-- ltn__product-item -->
                                    @forelse($param['classified'] as $item)
                                        <x-home.classified.item-col :item="$item"></x-home.classified.item-col>
                                    @empty
                                        <p>Chưa có dữ liệu</p>
                                    @endforelse
                                    <!-- ltn__product-item -->

                                    <!--  -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_product_list">
                            <div class="ltn__product-tab-content-inner ltn__product-list-view">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Search Widget -->
                                        <div class="ltn__search-widget mb-30">
                                        <form action="" method="get">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="text" name="search" id="keywords" class="form-control" placeholder="Tìm kiếm theo từ khóa, địa chỉ, giá...">
                                                    <!-- <div id="search_ajax"></div> -->
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <input type="number" name="min_price" class="form-control" placeholder="Giá tối thiểu" min="0">
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <input type="number" name="max_price" class="form-control" placeholder="Giá tối đa" min="0">
                                                </div>
                                                <div class="col-md-12 mt-3 text-center">
                                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Tìm kiếm</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    @foreach( $param['classified'] as $item)
                                        <x-home.classified.item-row :item="$item"></x-home.classified.item-row>
                                    @endforeach
                                    <!-- ltn__product-item -->

                                    <!--  -->
                                </div>
                            </div>
                        </div>
                    </div>
                        {{$param['classified']->render('Home.Layouts.Paginate')}}
                </div>
                <div class="col-lg-4 pt-50">
                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar pt-5">
                        <div class="widget pt-5 ltn__menu-widget ltn__menu-widget-2--- ltn__menu-widget-2-color-2---">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">Danh mục</h4>
                            <ul>
                                @foreach($param['group'] as $i)
                                    <li><a href="{{$i->group_url}}">{{$i->group_name}} <span>({{$i->group_classified->count()}})</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT DETAILS AREA END -->
    <!-- MODAL AREA START (Quick View Modal) -->
    @foreach($param['classified'] as $item)
    <div class="ltn__modal-area ltn__quick-view-modal-area">
        <div class="modal fade" id="quick_view_modal{{$item->id}}" tabindex="-1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <!-- <i class="fas fa-times"></i> -->
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="ltn__quick-view-modal-inner">
                            <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="modal-product-img">
                                            <img src="{{asset(json_decode($item->classified_image)[0])}}" alt="#">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="modal-product-info">
{{--                                            <div class="product-ratting">--}}
{{--                                                <ul>--}}
{{--                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>--}}
{{--                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>--}}
{{--                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>--}}
{{--                                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>--}}
{{--                                                    <li><a href="#"><i class="far fa-star"></i></a></li>--}}
{{--                                                    <li class="review-total"> <a href="#"> ( 95 Reviews )</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
                                            <h3><a href="product-details.html">{{$item->classified_title}}</a></h3>
                                            <div class="product-price">
                                                <span>{{number_format($item->classified_price,0,'',',')}} {{$item->price->unit_name}}</span>
{{--                                                <del>$36,500</del>--}}
                                            </div>
                                            <hr>
                                            <div class="modal-product-brief">
                                                <p>{!! $item->classified_content!!}</p>
                                            </div>
                                            <div class="modal-product-meta ltn__product-details-menu-1 d-none">
                                                <ul>
                                                    <li>
                                                        <strong>Categories:</strong>
                                                        <span>
                                                            <a href="#">Parts</a>
                                                            <a href="#">Car</a>
                                                            <a href="#">Seat</a>
                                                            <a href="#">Cover</a>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="ltn__product-details-menu-2 d-none">
                                                <ul>
                                                    <li>
                                                        <div class="cart-plus-minus">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="theme-btn-1 btn btn-effect-1" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                            <i class="fas fa-shopping-cart"></i>
                                                            <span>ADD TO CART</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- <hr> -->
                                            <div class="ltn__product-details-menu-3">
                                                <ul>
                                                    <li>
                                                        <a href="#" class="" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart"></i>
                                                            <span>Add to Wishlist</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="" title="Compare" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                            <i class="fas fa-exchange-alt"></i>
                                                            <span>Compare</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <hr>
                                            <div class="ltn__social-media">
                                                <ul>
                                                    <li>Share:</li>
                                                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                                    <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>

                                                </ul>
                                            </div>
                                            <label class="float-end mb-0"><a class="text-decoration" href="product-details.html"><small>View Details</small></a></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- MODAL AREA END -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        function autocompleteSetup(inputId, resultDivId) {
            $('#' + inputId).keyup(function() {
                var query = $(this).val();
                if (query != '') {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('autocomplete_ajax') }}",
                        method: "POST",
                        data: {
                            query: query,
                            _token: _token
                        },
                        success: function(data) {
                            $('#' + resultDivId).fadeIn();
                            $('#' + resultDivId).html(data);
                        }
                    });
                } else {
                    $('#' + resultDivId).fadeOut();
                }
            });

            $(document).on('click', 'li', function() {
                $('#' + inputId).val($(this).text());
                $('#' + resultDivId).fadeOut();
            });
        }

        autocompleteSetup('keywords', 'search_ajax');
        autocompleteSetup('keywords_list', 'search_ajax_list');
        
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

    .ltn__search-widget {
    padding: 20px;
    background: #f7f7f7;
    border-radius: 8px;
}

.ltn__search-widget .form-control {
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 10px;
    font-size: 16px;
}

.ltn__search-widget .btn-primary {
    margin-top: -59px;
    height: 50px;
    background-color: #ff5a5f; /* Đổi màu nút sang xanh dương */
    border: none;
    padding: 12px 25px; /* Tăng kích thước padding cho nút */
    font-size: 18px; /* Tăng kích thước font chữ */
    border-radius: 50px; /* Bo tròn nút */
    cursor: pointer;
    transition: background-color 0.3s ease; /* Thêm hiệu ứng khi hover */
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Thêm shadow để nổi bật */
}

.ltn__search-widget .btn-primary:hover {
    background-color: #0056b3; /* Màu khi hover */
}

.ltn__search-widget .btn-primary i {
    margin-right: 8px; /* Tăng khoảng cách giữa biểu tượng và chữ */
}

.ltn__search-widget .row {
    align-items: center;
}

.ltn__search-widget .row .col-md-6 {
    margin-bottom: 10px;
}

</style>
@endsection