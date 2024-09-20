<!-- PRODUCT SLIDER AREA START -->
<div class="ltn__product-slider-area ltn__product-gutter pt-115 pb-90 plr--7">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2--- text-center">
                    <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">Bài viết</h6>
                    <h1 class="section-title">Bài viết nhà đất mới nhất</h1>
                </div>
            </div>
        </div>
        <div class="row ltn__product-slider-item-four-active-full-width slick-arrow-1">
            @foreach($param['classified'] as $item)
                <!-- ltn__product-item -->
                <div class="col-lg-12">
                    <div class="ltn__product-item ltn__product-item-4 text-center---">
                        <div class="product-img" style="max-height: 250px;height: 250px;">
                            <a style="height: 100%" href="{{ route('chi-tiet-tin', $item->classified_url) }}">
                                <img class="w-100 h-100" style="object-fit: cover" src="{{ asset(json_decode($item->classified_image)[0]) }}" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge bg-green">{{ $item->group->parent_id == 1 ? "Bán" : "Cho thuê" }}</li>
                                </ul>
                            </div>
                            <div class="product-img-location-gallery">
                                <div class="product-img-location">
                                    <ul>
                                        <li>
                                            <a href="javascript:{}"><i class="flaticon-pin"></i>
                                                {{ $item->classified_address }},
                                                {{ $item->ward->ward_name ?? '' }},
                                                {{ $item->district->district_name ?? '' }},
                                                {{ $item->province->province_name ?? '' }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-img-gallery">
                                    {{-- <ul>
                                        <li>
                                            <a href="product-details.html"><i class="fas fa-camera"></i> 4</a>
                                        </li>
                                        <li>
                                            <a href="product-details.html"><i class="fas fa-film"></i> 2</a>
                                        </li>
                                    </ul> --}}
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-price">
                                <span>{{ number_format($item->classified_price, 0, '', ',') }} <label>{{ $item->price->unit_name }}</label></span>
                            </div>
                            <h2 class="product-title"><a href="{{ route('chi-tiet-tin', $item->classified_url) }}">{{ $item->classified_title }}</a></h2>
                            <div class="product-description">
                                <p>
                                {{ Str::limit(html_entity_decode(strip_tags($item->classified_content)), 10, '...') }}
                                </p>
                            </div>
                            <ul class="ltn__list-item-2 ltn__list-item-2-before">
                                <li><span>{{ $item->bed->param_name }} <i class="flaticon-bed"></i></span>
                                    P.ngủ
                                </li>
                                <li><span>{{ $item->toilet->param_name }} <i class="flaticon-clean"></i></span>
                                    Vệ sinh
                                </li>
                                <li><span>{{ $item->classified_area }} <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>
                                    {{ $item->area->unit_name }}
                                </li>
                            </ul>
                        </div>
                        <div class="product-info-bottom">
                            <div class="real-estate-agent">
                                <div class="agent-img">
                                    <!-- <a href="team-details.html"><img src="{{ $item->avatar }}" alt="#"></a> -->
                                </div>
                                <div class="agent-brief">
                                    <h6><a href="team-details.html">{{ $item->user_type == 1 ? $item->fullname : $item->business_name }}</a></h6>
                                    <small>{{ $item->user->user_type == 1 ? "Cá nhân" : "Doanh nghiệp" }}</small>
                                </div>
                            </div>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal{{ $item->id }}">
                                            <i class="flaticon-expand"></i>
                                        </a>
                                    </li>
                                    <li>
                                    <form id="wishlist-form-{{ $item->id }}" action="{{ route('them-yeu-thich', $item->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                    <a href="#" title="Wishlist" onclick="event.preventDefault(); document.getElementById('wishlist-form-{{ $item->id }}').submit();">
                                    <i class="flaticon-heart-1"></i>
                                    </a>
                                    </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
           @endforeach
        </div>
    </div>
</div>
@foreach($param['classified'] as $item)
    <div class="ltn__modal-area ltn__quick-view-modal-area">
        <div class="modal fade" id="quick_view_modal{{ $item->id }}" tabindex="-1">
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
                                            <img src="{{ asset(json_decode($item->classified_image)[0]) }}" alt="#">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="modal-product-info">
                                            <h3><a href="{{ route('chi-tiet-tin', $item->classified_url) }}">{{ $item->classified_title }}</a></h3>
                                            <div class="product-price">
                                                <span>{{ number_format($item->classified_price, 0, '', ',') }} {{ $item->price->unit_name }}</span>
                                            </div>
                                            <hr>
                                            <div class="modal-product-brief">
                                                <p>{!! $item->classified_content !!}</p>
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
                                            <label class="float-end mb-0"><a class="text-decoration" href="{{ route('chi-tiet-tin', $item->classified_url) }}"><small>View Details</small></a></label>
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
<!-- PRODUCT SLIDER AREA END -->
