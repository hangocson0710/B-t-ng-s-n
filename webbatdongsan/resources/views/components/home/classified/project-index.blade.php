<div class="ltn__product-area ltn__product-gutter mb-120">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2--- text-center">
                    <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">Dự án</h6>
                    <h1 class="section-title">Các dự án đang triển khai</h1>
                </div>
            </div>
        </div>
        <div class="row">
        @foreach($param['project'] as $item)
            <!-- ltn__product-item -->
            <div class="col-xl-3 col-sm-3 col-6">
                <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                    <div class="product-img" style="max-height: 200px;height: 200px;">
                        <a style="height: 100%" href="{{route('chi-tiet-tin', $item->project_url)}}">
                            <img style="object-fit: cover" class="w-100 h-100" src="{{ asset(json_decode($item->project_image)[0]) }}" alt="#"></a>
                        <div class="real-estate-agent">
                            <div class="agent-img">
                                <a href="team-details.html">
                                    <img src="{{ $item->user->avatar ?? asset('default-avatar.png') }}" alt="#"></a>
                            </div>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-badge">
                            <ul>
                                <li class="sale-badg">Dự án</li>
                            </ul>
                        </div>
                        <h2 class="product-title">
                            <a href="{{route('chi-tiet-tin', $item->project_url)}}">{{$item->project_name}}</a>
                        </h2>
                        <div class="product-img-location">
                            <ul>
                                @if(isset($item->location))
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="flaticon-pin"></i>
                                        {{$item->location->project_address}}, {{$item->ward_name}}, {{$item->district_name}}, {{$item->province_name}}
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="product-info-bottom">
                        <div class="product-price">
                            <span>{{ number_format($item->project_price, 0, '', ',') }} <label>{{$item->price->unit_name}}</label></span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
