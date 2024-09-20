<!-- BLOG AREA START (blog-3) -->
<div class="ltn__blog-area pt-115--- pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2--- text-center">
                    <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">Tin tức & Blogs</h6>
                    <h1 class="section-title">Tin tức</h1>
                </div>
            </div>
        </div>
        <div class="row  ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
            <!-- Blog Item -->
            @foreach($news as $item)
            <div class="col-lg-12">
                <div class="ltn__blog-item ltn__blog-item-3">
                    <div class="ltn__blog-img">
                        <a href="{{route('chi-tiet-tin-tuc',$item->news_url)}}"><img src="{{asset($item->news_image)}}" alt="#"></a>
                    </div>
                    <div class="ltn__blog-brief">
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-author">
                                    <a href="#"><i class="far fa-user"></i>by: {{$item->admin->admin_fullname}}</a>
                                </li>
                                <li class="ltn__blog-tags">
                                    <a href="#"><i class="fas fa-tags"></i>{{$item->group->group_name}}</a>
                                </li>
                            </ul>
                        </div>
                        <h3 class="ltn__blog-title"><a href="{{route('chi-tiet-tin-tuc',$item->news_url)}}">{{$item->news_title}}</a></h3>
                        <div class="ltn__blog-meta-btn">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>{{date('d/m/Y',$item->created_at)}}</li>
                                </ul>
                            </div>
                            <div class="ltn__blog-btn">
                                <a href="{{route('chi-tiet-tin-tuc',$item->news_url)}}">Đọc tiếp</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- BLOG AREA END -->
