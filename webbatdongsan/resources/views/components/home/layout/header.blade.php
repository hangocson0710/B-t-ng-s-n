<header class="ltn__header-area ltn__header-5 ltn__header-transparent--- gradient-color-4---">
    <!-- ltn__header-top-area start -->
    <div class="ltn__header-top-area section-bg-6 top-area-color-white---">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="ltn__top-bar-menu">
                        <ul>
                            <li><a href="mailto:{{$about->about_email}}"><i class="icon-mail"></i> {{$about->about_email}}</a></li>
                            <li><a href="javascript:{}"><i class="icon-placeholder"></i> {{$about->about_address}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="top-bar-right text-end">
                        <div class="ltn__top-bar-menu">
                            <ul>
                                <li class="d-none">
                                    <!-- ltn__language-menu -->
                                    <div class="ltn__drop-menu ltn__currency-menu ltn__language-menu">
                                        <ul>
                                            <li><a href="#" class="dropdown-toggle"><span class="active-currency">English</span></a>
                                                <ul>
                                                    <li><a href="#">Arabic</a></li>
                                                    <li><a href="#">Bengali</a></li>
                                                    <li><a href="#">Chinese</a></li>
                                                    <li><a href="#">English</a></li>
                                                    <li><a href="#">French</a></li>
                                                    <li><a href="#">Hindi</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <!-- ltn__social-media -->
                                    <div class="ltn__social-media">
                                        <ul>
                                            <li><a href="{{$about->about_facebook}}" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="{{$about->about_youtube}}" target="_blank" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-top-area end -->

    <!-- ltn__header-middle-area start -->
    <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-white" style="padding: 0">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="site-logo-wrap">
                        <div class="site-logo" style="max-height: 120px;height: 100px;">
                            <a href="index.html" >
                                <img class="" style="height: 80%" src="{{asset($about->about_logo)}}" alt="Logo">
                            </a>
                        </div>
                        <div class="get-support clearfix d-none">
                            <div class="get-support-icon">
                                <i class="icon-call"></i>
                            </div>
                            <div class="get-support-info">
                                <h6>Get Support</h6>
                                <h4><a href="tel:+123456789">123-456-789-10</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col header-menu-column">
                    <div class="header-menu d-none d-xl-block">
                        <nav>
                            <div class="ltn__main-menu">
                                <ul>
                                    <li class=""><a href="{{route('trang-chu')}}">Trang chủ</a></li>
                                   @foreach($group_parent as $i)
                                    <li class="menu-icon"><a href="#">{{$i->group_name}}</a>
                                        <ul>
                                            @foreach($i->group_child as $child)
                                            <li><a href="{{$child->group_type==1?'/'.$child->group_url:''}}{{$child->group_type==2?'/du-an/'.$child->group_url:null}}{{$child->group_type==3?'/tin-tuc/'.$child->group_url:null}}">{{$child->group_name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
{{--                                    <li><a href="contact.html">Contact</a></li>--}}
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col ltn__header-options ltn__header-options-2 mb-sm-20">
                    <!-- header-search-1 -->
                    <div class="header-search-wrap">
                        <div class="header-search-1">
                            <div class="search-icon">
                                <i class="icon-search for-search-show"></i>
                                <i class="icon-cancel  for-search-close"></i>
                            </div>
                        </div>
                        <div class="header-search-1-form">
                            <form id="#" method="get"  action="#">
                                <input type="text" name="search" value="" placeholder="Search here..."/>
                                <button type="submit">
                                    <span><i class="icon-search"></i></span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- user-menu -->
                    <div class="ltn__drop-menu user-menu">
                        <ul>
                            @if(\Illuminate\Support\Facades\Auth::check())
                            <li>
                                <a href="{{route('cap-nhat-thong-tin')}}"><i class="icon-user"></i></a>
                                <ul>
                                    <li><a href="{{route('cap-nhat-thong-tin')}}">Trang cá nhân</a></li>
                                    <li><a href="{{route('dang-xuat')}}">Đăng xuất</a></li>
{{--                                    <li></li>--}}
                                </ul>
                            </li>
                            @else
                                <li>
                                    <a href="#"><i class="icon-user"></i></a>
                                    <ul>
                                        <li><a href="{{route('dang-ki')}}">Đăng kí</a></li>
                                        <li><a href="{{route('dang-nhap')}}">Đăng nhập</a></li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="ltn__drop-menu user-menu">
                        <ul>
{{--                            @if(\Illuminate\Support\Facades\Auth::check())--}}
{{--                                <li>--}}
{{--                                    <a href=""><i class="icon-user"></i></a>--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="account.html">Trang cá nhân</a></li>--}}
{{--                                        <li><a href="{{route('dang-xuat')}}">Đăng xuất</a></li>--}}
{{--                                        --}}{{--                                    <li></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                            @else--}}
                                <li>
                                    <a href="#"><i class="icon-open"></i></a>
                                    <ul>
                                        <li><a href="{{route('dang-tin')}}">Đăng bài viết</a></li>
                                        <li><a href="{{route('dang-du-an')}}">Đăng dự án</a></li>
                                        <li><a href="{{route('nap-coin')}}">Nạp coin</a></li>
                                    </ul>
                                </li>
{{--                            @endif--}}
                        </ul>
                    </div>
                    <!-- Mobile Menu Button -->
                    <div class="mobile-menu-toggle d-xl-none">
                        <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                            <svg viewBox="0 0 800 600">
                                <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                <path d="M300,320 L540,320" id="middle"></path>
                                <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-middle-area end -->
</header>
