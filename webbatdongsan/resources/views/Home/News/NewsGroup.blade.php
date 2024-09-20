@section('Title','Tin tức')
@extends('Home.Layouts.Master')
@section('Content')
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image "  data-bs-bg="img/bg/14.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-title">{{$param['group']->group_name}}</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="/"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>Tin tức</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->
    <div class="ltn__blog-area mb-120">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div style="width: 100%">
                    <div class="ltn__blog-list-wrap">
                        <!-- Blog Item -->
                        @forelse($param['news'] as $item)
                            <div>
                            <div class="ltn__blog-item ltn__blog-item-5">
                                <div class="ltn__blog-img">
                                    <a href="{{route('chi-tiet-tin-tuc',$item->news_url)}}"><img class="w-100" src="{{asset($item->news_image)}}" alt="Image"></a>
                                </div>
                                <div class="ltn__blog-brief">
                                    <div class="ltn__blog-meta">
                                        <ul>
                                            <li class="ltn__blog-category">
                                                <a href="#">{{$item->group->group_name}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="ltn__blog-title"><a href="{{route('chi-tiet-tin-tuc',$item->news_url)}}">{{$item->news_title}}</a></h3>
                                    <div class="ltn__blog-meta">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="far fa-eye"></i>{{$item->num_view}} Lượt xem</a>
                                            </li>
                                            <li class="ltn__blog-date">
                                                <i class="far fa-calendar-alt"></i>{{date('d/m/Y',$item->created_at)}}
                                            </li>
                                        </ul>
                                    </div>
                                    <div style=" overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 2; /* number of lines to show */
           line-clamp: 2;
   -webkit-box-orient: vertical;">{!!  $item->news_content !!}</div>
                                    <div class="ltn__blog-meta-btn">
                                        <div class="ltn__blog-meta">
                                            <ul>
                                                <li class="ltn__blog-author">
                                                    <a href="#"><img src="{{asset($item->admin->admin_image)}}" alt="#">Tác giả: {{$item->admin->admin_fullname}}</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="ltn__blog-btn">
                                            <a href="{{route('chi-tiet-tin-tuc',$item->news_url)}}"><i class="fas fa-arrow-right"></i>Đọc tiếp</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        @empty
                            <p>Chưa có bài viết</p>
                        @endforelse
                    </div>
                    </div>
                </div>
{{--            </div>--}}
                <div class="col-md-4">
                    <aside class="sidebar-area blog-sidebar ltn__right-sidebar">
                        <!-- Author Widget -->
                        <div class="widget ltn__search-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">Tìm kiếm</h4>
                            <form action="" method="get">
                                <input type="text" name="search" value="{{request()->search}}" placeholder="Nhập từ khóa...">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <!-- Menu Widget (Category) -->
                        <div class="widget ltn__menu-widget ltn__menu-widget-2--- ltn__menu-widget-2-color-2---">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">Danh mục tin tức</h4>
                            <ul>
                                @foreach($param['list_group'] as $i)
                                <li><a href="{{route('danh-sach-tin-tuc',$i->group_url)}}">{{$i->group_name}} <span>({{$i->group_news->count()}})</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Popular Product Widget -->
                        <!-- Popular Post Widget -->
                        <div class="widget ltn__popular-post-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">Bài viết xem nhiều</h4>
                            <ul>
                                @foreach($param['news_view'] as $i)
                                <li>
                                    <div class="popular-post-widget-item clearfix">
                                        <div class="popular-post-widget-img">
                                            <a href="{{route('chi-tiet-tin-tuc',$i->news_url)}}"><img src="{{asset($i->news_image)}}" alt="#"></a>
                                        </div>
                                        <div class="popular-post-widget-brief">
                                            <h6><a href="{{route('chi-tiet-tin-tuc',$i->news_url)}}">{{$i->news_title}}</a></h6>
                                            <div class="ltn__blog-meta">
                                                <ul>
                                                    <li class="ltn__blog-date">
                                                        <a href="javascript:{}"><i class="far fa-calendar-alt"></i>{{date('d/m/Y',$i->created_at)}}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Popular Post Widget (Twitter Post) -->
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection
