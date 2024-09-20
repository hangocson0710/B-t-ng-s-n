<div class="col-lg-12">
    <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5">
        <div class="product-img">
            <a href="{{ route('chi-tiet-tin', $item->classified_url) }}">
                <img src="{{ asset(json_decode($item->classified_image)[0]) }}" alt="#">
            </a>
        </div>
        <div class="product-info">
            <div class="product-badge-price">
                <div class="product-badge">
                    <ul>
                        <li class="sale-badg">{{ $item->group->parent_id == 1 ? 'Bán' : 'Cho thuê' }}</li>
                    </ul>
                </div>
                <div class="product-price">
                    <span>{{ number_format($item->classified_price, 0, '', ',') }} <label>{{ optional($item->price)->unit_name }}</label></span>
                </div>
            </div>
            <h2 class="product-title">
                <a href="{{ route('chi-tiet-tin', $item->classified_url) }}">{{ $item->classified_title }}</a>
            </h2>
            <div class="product-img-location">
                <ul>
                    <li>
                        <a href="locations.html">
                            <i class="flaticon-pin"></i>
                            {{ $item->classified_address }},
                            {{ optional($item->ward)->ward_name }},
                            {{ optional($item->district)->district_name }},
                            {{ optional($item->province)->province_name }}
                        </a>
                    </li>
                </ul>
            </div>
            <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                <li>
                    <span>{{ optional($item->bed)->param_name }}</span>
                    P.Ngủ
                </li>
                <li>
                    <span>{{ optional($item->toilet)->param_name }}</span>
                    P.Vệ sinh
                </li>
                <li>
                    <span>{{ $item->classified_area }} </span>
                    {{ optional($item->area)->unit_name }}
                </li>
            </ul>
        </div>
        <div class="product-info-bottom">
            <div class="real-estate-agent">
                <div class="agent-img">
                    <a href="#"><img src="{{ optional($item->user)->avatar }}" alt="#"></a>
                </div>
                <div class="agent-brief">
                    <h6><a href="team-details.html">{{ optional($item->user)->fullname }}</a></h6>
                    <small>{{ optional($item->user)->user_type == 1 ? 'Cá nhân' : 'Doanh nghiệp' }}</small>
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
                    <li>
                        <a href="{{ route('chi-tiet-tin', $item->classified_url) }}" title="Product Details">
                            <i class="flaticon-add"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
