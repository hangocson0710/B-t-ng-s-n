@extends('Home.Layouts.Master')
@section('Content')
    <!-- PAGE DETAILS AREA START (blog-details) -->
    <div class="ltn__page-details-area ltn__blog-details-area mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__blog-details-wrap">
                        <div class="ltn__page-details-inner ltn__blog-details-inner">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-category">
                                        <a href="{{route('danh-sach-tin-tuc',$news->group->group_url)}}">{{$news->group->group_name}}</a>
                                    </li>
                                </ul>
                            </div>
                            <h2 class="ltn__blog-title">{{$news->news_title}}
                            </h2>
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-author">
                                        <a href="javascript:{}"><img src="{{asset($news->admin->admin_image)}}" alt="#">Bởi: {{$news->admin->admin_fullname}}</a>
                                    </li>
                                    <li class="ltn__blog-date">
                                        <i class="far fa-calendar-alt"></i>{{date('d/m/Y',$news->created_at)}}
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center">
                                <img src="{{asset($news->news_image)}}">
                            </div>
                            <div>{!! $news->news_content !!}</div>
                        </div>
                        <!-- blog-tags-social-media -->
                        <div class="ltn__blog-tags-social-media mt-80 row">

                            <div class="ltn__social-media text-right text-end col-lg-4">
                                <h4>Social Share</h4>
                                <ul>
                                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>

                                    <li><a href="#" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <!-- prev-next-btn -->

                        <hr>
                        <!-- related-post -->
                        <div class="related-post-area mb-50">
                            <h4 class="title-2">Cùng chuyên mục</h4>
                            <div class="row">
                                @foreach($param['news'] as $i)
                                <div class="col-md-6">
                                    <!-- Blog Item -->
                                    <div class="ltn__blog-item ltn__blog-item-6">
                                        <div class="ltn__blog-img">
                                            <a href="{{route('chi-tiet-tin-tuc',$i->news_url)}}"><img src="{{asset($i->news_image)}}" alt="Image"></a>
                                        </div>
                                        <div class="ltn__blog-brief">
                                            <div class="ltn__blog-meta">
                                                <ul>
                                                    <li class="ltn__blog-date ltn__secondary-color">
                                                        <i class="far fa-calendar-alt"></i>{{date('d/m/Y',$i->created_at)}}
                                                    </li>
                                                </ul>
                                            </div>
                                            <h3 class="ltn__blog-title"><a href="{{route('chi-tiet-tin-tuc',$i->news_url)}}">{{$i->news_title}}</a></h3>
{{--                                            <p>Lorem ipsum dolor sit amet, conse ctet ur adipisicing elit, sed doing.</p>--}}
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">

                </div>
            </div>
        </div>
    </div>
    <!-- PAGE DETAILS AREA END -->
@endsection
