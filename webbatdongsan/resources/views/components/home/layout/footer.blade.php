<footer class="ltn__footer-area  ">
    <div class="footer-top-area  section-bg-2 plr--5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-about-widget">
                        <div class="footer-logo">
                            <div class="site-logo">
                                <img src="{{$about->about_logo}}" alt="Logo">
                            </div>
                        </div>
                        <p>{{$about->about_info}}</p>
                        <div class="footer-address">
                            <ul>
                                <li>
                                    <div class="footer-address-icon">
                                        <i class="icon-placeholder"></i>
                                    </div>
                                    <div class="footer-address-info">
                                        <p>{{$about->about_address}}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="footer-address-icon">
                                        <i class="icon-call"></i>
                                    </div>
                                    <div class="footer-address-info">
                                        <p><a href="tel:+0123-456789">{{$about->about_phone}}</a></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="footer-address-icon">
                                        <i class="icon-mail"></i>
                                    </div>
                                    <div class="footer-address-info">
                                        <p><a href="mailto:{{$about->about_email}}">{{$about->about_email}}</a></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="ltn__social-media mt-20">
                            <ul>
                                <li><a href="{{$about->about_facebook}}" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{$about->about_youtube}}" target="_blank" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-menu-widget clearfix">
                        <h4 class="footer-title">Danh mục bài viết</h4>
                        <div class="footer-menu">
                            <ul>
                                @foreach($group_classified as $item)
                                <li><a href="about.html">{{$item->group_name}}</a></li>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-menu-widget clearfix">
                        <h4 class="footer-title">Tài khoản</h4>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="{{route('dang-ki')}}">Đăng kí</a></li>
                                <li><a href="{{route('dang-nhap')}}">Đăng nhập</a></li>
                                <li><a href="{{route('cap-nhat-thong-tin')}}">Trang cá nhân</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
{{--                <div class="col-xl-2 col-md-6 col-sm-6 col-12">--}}
{{--                    <div class="footer-widget footer-menu-widget clearfix">--}}
{{--                        <h4 class="footer-title">Customer Care</h4>--}}
{{--                        <div class="footer-menu">--}}
{{--                            <ul>--}}
{{--                                <li><a href="login.html">Login</a></li>--}}
{{--                                <li><a href="account.html">My account</a></li>--}}
{{--                                <li><a href="wishlist.html">Wish List</a></li>--}}
{{--                                <li><a href="order-tracking.html">Order tracking</a></li>--}}
{{--                                <li><a href="faq.html">FAQ</a></li>--}}
{{--                                <li><a href="contact.html">Contact us</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-md-6 col-sm-12 col-12">--}}
{{--                    <div class="footer-widget footer-newsletter-widget">--}}
{{--                        <h4 class="footer-title">Newsletter</h4>--}}
{{--                        <p>Subscribe to our weekly Newsletter and receive updates via email.</p>--}}
{{--                        <div class="footer-newsletter">--}}
{{--                            <form action="#">--}}
{{--                                <input type="email" name="email" placeholder="Email*">--}}
{{--                                <div class="btn-wrapper">--}}
{{--                                    <button class="theme-btn-1 btn" type="submit"><i class="fas fa-location-arrow"></i></button>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                        <h5 class="mt-30">We Accept</h5>--}}
{{--                        <img src="img/icons/payment-4.png" alt="Payment Image">--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
    <div class="ltn__copyright-area ltn__copyright-2 section-bg-7  plr--5">
        <div class="container-fluid ltn__border-top-2">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="ltn__copyright-design clearfix">
                        <p>All Rights Reserved @ Company <span class="current-year"></span></p>
                    </div>
                </div>
                <div class="col-md-6 col-12 align-self-center">
                    <div class="ltn__copyright-menu text-end">
                        <ul>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Claim</a></li>
                            <li><a href="#">Privacy & Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
