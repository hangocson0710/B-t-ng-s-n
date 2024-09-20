@extends('Home.Layouts.Master')
@section('Title','Trang chủ')
@section('Content')

    <x-home.index.banner></x-home.index.banner>

    <!-- CAR DEALER FORM AREA START -->
    <!-- <div class="ltn__car-dealer-form-area mt--65 mt-120 pb-115---">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__car-dealer-form-tab">
                        <div class="ltn__tab-menu  text-uppercase d-none">
                            <div class="nav">
                                <a class="active show" data-bs-toggle="tab" href="#ltn__form_tab_1_1"><i class="fas fa-car"></i>Find A Car</a>
                                <a data-bs-toggle="tab" href="#ltn__form_tab_1_2" class=""><i class="far fa-user"></i>Get a Dealer</a>
                            </div>
                        </div>
                        <div class="tab-content bg-white box-shadow-1 ltn__border position-relative pb-10">
                            <div class="tab-pane fade active show" id="ltn__form_tab_1_1">
                                <div class="car-dealer-form-inner">
                                    <form action="#" class="ltn__car-dealer-form-box row">
                                        <div class="ltn__car-dealer-form-item ltn__custom-icon---- ltn__icon-car---- col-lg-3 col-md-6">
                                            <select class="nice-select">
                                                <option>Choose Area</option>
                                                <option>chicago</option>
                                                <option>London</option>
                                                <option>Los Angeles</option>
                                                <option>New York</option>
                                                <option>New Jersey</option>
                                            </select>
                                        </div>
                                        <div class="ltn__car-dealer-form-item ltn__custom-icon---- ltn__icon-meter---- col-lg-3 col-md-6">
                                            <select class="nice-select">
                                                <option>Property Status</option>
                                                <option>Open house</option>
                                                <option>Rent</option>
                                                <option>Sale</option>
                                                <option>Sold</option>
                                            </select>
                                        </div>
                                        <div class="ltn__car-dealer-form-item ltn__custom-icon---- ltn__icon-calendar---- col-lg-3 col-md-6">
                                            <select class="nice-select">
                                                <option>Property Type</option>
                                                <option>Apartment</option>
                                                <option>Co-op</option>
                                                <option>Condo</option>
                                                <option>Single Family Home</option>
                                            </select>
                                        </div>
                                        <div class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-calendar col-lg-3 col-md-6">
                                            <div class="btn-wrapper text-center mt-0">
                                                 {{--<button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">Search Inventory</button> --}}
                                                <a href="shop-right-sidebar.html" class="btn theme-btn-1 btn-effect-1 text-uppercase">Find Now</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="ltn__form_tab_1_2">
                                <div class="car-dealer-form-inner">
                                    <form action="#" class="ltn__car-dealer-form-box row">
                                        <div class="ltn__car-dealer-form-item ltn__custom-icon---- ltn__icon-car---- col-lg-3 col-md-6">
                                            <select class="nice-select">
                                                <option>Choose Area</option>
                                                <option>chicago</option>
                                                <option>London</option>
                                                <option>Los Angeles</option>
                                                <option>New York</option>
                                                <option>New Jersey</option>
                                            </select>
                                        </div>
                                        <div class="ltn__car-dealer-form-item ltn__custom-icon---- ltn__icon-meter---- col-lg-3 col-md-6">
                                            <select class="nice-select">
                                                <option>Property Status</option>
                                                <option>Open house</option>
                                                <option>Rent</option>
                                                <option>Sale</option>
                                                <option>Sold</option>
                                            </select>
                                        </div>
                                        <div class="ltn__car-dealer-form-item ltn__custom-icon---- ltn__icon-calendar---- col-lg-3 col-md-6">
                                            <select class="nice-select">
                                                <option>Property Type</option>
                                                <option>Apartment</option>
                                                <option>Co-op</option>
                                                <option>Condo</option>
                                                <option>Single Family Home</option>
                                            </select>
                                        </div>
                                        <div class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-calendar col-lg-3 col-md-6">
                                            <div class="btn-wrapper text-center mt-0">
                                                {{-- <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">Search Inventory</button> --}}
                                                <a href="shop-right-sidebar.html" class="btn theme-btn-1 btn-effect-1 text-uppercase">Search Properties</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- CAR DEALER FORM AREA END -->
    <!-- ABOUT US AREA END -->

    <!-- COUNTER UP AREA START -->
    <!-- <div class="ltn__counterup-area section-bg-1 pt-120 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 align-self-center">
                    <div class="ltn__counterup-item text-color-white---">
                        <div class="counter-icon">
                            <i class="flaticon-select"></i>
                        </div>
                        <h1><span class="counter">560</span><span class="counterUp-icon">+</span> </h1>
                        <h6>Total Area Sq</h6>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 align-self-center">
                    <div class="ltn__counterup-item text-color-white---">
                        <div class="counter-icon">
                            <i class="flaticon-office"></i>
                        </div>
                        <h1><span class="counter">197</span><span class="counterUp-letter">K</span><span class="counterUp-icon">+</span> </h1>
                        <h6>Apartments Sold</h6>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 align-self-center">
                    <div class="ltn__counterup-item text-color-white---">
                        <div class="counter-icon">
                            <i class="flaticon-excavator"></i>
                        </div>
                        <h1><span class="counter">268</span><span class="counterUp-icon">+</span> </h1>
                        <h6>Total Constructions</h6>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 align-self-center">
                    <div class="ltn__counterup-item text-color-white---">
                        <div class="counter-icon">
                            <i class="flaticon-armchair"></i>
                        </div>
                        <h1><span class="counter">340</span><span class="counterUp-icon">+</span> </h1>
                        <h6>Apartio Rooms</h6>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- COUNTER UP AREA END -->

    <!-- ABOUT US AREA START -->
    <div class="ltn__about-us-area pt-120 pb-90 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-info-wrap">
                        <div class="section-title-area ltn__section-title-2--- mb-30">
{{--                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">About Us</h6>--}}
                            <h1 class="section-title">Nhà đất bán hôm nay</h1>
                            <p>Cập nhật thường xuyên và đầy đủ các loại hình bất động sản cho thuê như: thuê phòng trọ, nhà riêng, thuê biệt thự, văn phòng, kho xưởng hay thuê mặt bằng kinh doanh giúp bạn nhanh chóng tìm được bất động sản ưng ý.</p>
                        </div>
                        <ul class="ltn__list-item-1 ltn__list-item-1-before clearfix">
                            <li> Các loại nhà đất bán</li>
                            <li>Các loại nhà đất cho thuê</li>
                            <li>Những dự án bất động sản</li>
                            <li>Tin tức biến động của bất động sản</li>
                        </ul>
                        <ul class="ltn__list-item-2 ltn__list-item-2-before ltn__flat-info">
                            <li><span>3 <i class="flaticon-bed"></i></span>
                                Bedrooms
                            </li>
                            <li><span>2 <i class="flaticon-clean"></i></span>
                                Bathrooms
                            </li>
                            <li><span>2 <i class="flaticon-car"></i></span>
                                Car parking
                            </li>
                            <li><span>3450 <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>
                                square Ft
                            </li>
                        </ul>
                        <ul class="ltn__list-item-2 ltn__list-item-2-before--- ltn__list-item-2-img mb-50">
                            <li>
                                <a href="" data-rel="lightcase:myCollection">
                                    <img src="{{asset('System/Home/img/img-slide/11.jpg')}}" alt="Image">
                                </a>
                            </li>
                            <li>
                                <a href="img/img-slide/12.jpg" data-rel="lightcase:myCollection">
                                    <img src="{{asset('System/Home/img/img-slide/12.jpg')}}" alt="Image">
                                </a>
                            </li>
                            <li>
                                <a href="img/img-slide/13.jpg" data-rel="lightcase:myCollection">
                                    <img src="{{asset('System/Home/img/img-slide/12.jpg')}}" alt="Image">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-img-wrap about-img-right">
                        <img src="{{asset('System/Home/img/img-slide/12.jpg')}}" alt="About Us Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ABOUT US AREA END -->

    <!-- FEATURE AREA START ( Feature - 6) -->
    <!-- <div class="ltn__feature-area section-bg-1 pt-120 pb-90 mb-120---">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">Our Services</h6>
                        <h1 class="section-title">Our Main Focus</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__custom-gutter--- justify-content-center">
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="ltn__feature-item ltn__feature-item-6 text-center bg-white  box-shadow-1">
                        <div class="ltn__feature-icon">
                             <span><i class="flaticon-house"></i></span> 
                            <img src="{{asset('System/Home/img/icons/icon-img/21.png')}}" alt="#">
                        </div>
                        <div class="ltn__feature-info">
                            <h3><a href="service-details.html">Buy a home</a></h3>
                            <p>over 1 million+ homes for sale available on the website, we can match you with a house you will want to call home.</p>
                            <a class="ltn__service-btn" href="service-details.html">Find A Home <i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="ltn__feature-item ltn__feature-item-6 text-center bg-white  box-shadow-1 active">
                        <div class="ltn__feature-icon">
                             <span><i class="flaticon-house-3"></i></span> 
                            <img src="{{asset('System/Home/img/icons/icon-img/22.png')}}" alt="#">
                        </div>
                        <div class="ltn__feature-info">
                            <h3><a href="service-details.html">Rent a home</a></h3>
                            <p>over 1 million+ homes for sale available on the website, we can match you with a house you will want to call home.</p>
                            <a class="ltn__service-btn" href="service-details.html">Find A Home <i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="ltn__feature-item ltn__feature-item-6 text-center bg-white  box-shadow-1">
                        <div class="ltn__feature-icon">
                             <span><i class="flaticon-deal-1"></i></span> 
                            <img src="{{asset('System/Home/img/icons/icon-img/23.png')}}" alt="#">
                        </div>
                        <div class="ltn__feature-info">
                            <h3><a href="service-details.html">Sell a home</a></h3>
                            <p>over 1 million+ homes for sale available on the website, we can match you with a house you will want to call home.</p>
                            <a class="ltn__service-btn" href="service-details.html">Find A Home <i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- FEATURE AREA END -->

    <x-home.classified.classified-news></x-home.classified.classified-news>

    <x-home.classified.project-index></x-home.classified.project-index>
    <!-- CATEGORY AREA START -->
    <div class="ltn__category-area section-bg-1-- ltn__primary-bg before-bg-1 bg-image bg-overlay-theme-black-5--0 pt-115 pb-90 d-none" data-bs-bg="img/bg/5.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h1 class="section-title white-color">Top Categories</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__category-slider-active slick-arrow-1">
                <div class="col-12">
                    <div class="ltn__category-item ltn__category-item-4 text-center">
                        <div class="ltn__category-item-img">
                            <a href="shop.html">
                                <i class="flaticon-car"></i>
                            </a>
                        </div>
                        <div class="ltn__category-item-name">
                            <h4><a href="shop.html">Parking Space</a></h4>
                        </div>
                        <div class="ltn__category-item-btn">
                            <a href="shop.html"><i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="ltn__category-item ltn__category-item-4 text-center">
                        <div class="ltn__category-item-img">
                            <a href="shop.html">
                                <i class="flaticon-car"></i>
                            </a>
                        </div>
                        <div class="ltn__category-item-name">
                            <h4><a href="shop.html">Parking Space</a></h4>
                        </div>
                        <div class="ltn__category-item-btn">
                            <a href="shop.html"><i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="ltn__category-item ltn__category-item-4 text-center">
                        <div class="ltn__category-item-img">
                            <a href="shop.html">
                                <i class="flaticon-car"></i>
                            </a>
                        </div>
                        <div class="ltn__category-item-name">
                            <h4><a href="shop.html">Parking Space</a></h4>
                        </div>
                        <div class="ltn__category-item-btn">
                            <a href="shop.html"><i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="ltn__category-item ltn__category-item-4 text-center">
                        <div class="ltn__category-item-img">
                            <a href="shop.html">
                                <i class="flaticon-car"></i>
                            </a>
                        </div>
                        <div class="ltn__category-item-name">
                            <h4><a href="shop.html">Parking Space</a></h4>
                        </div>
                        <div class="ltn__category-item-btn">
                            <a href="shop.html"><i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="ltn__category-item ltn__category-item-4 text-center">
                        <div class="ltn__category-item-img">
                            <a href="shop.html">
                                <i class="flaticon-car"></i>
                            </a>
                        </div>
                        <div class="ltn__category-item-name">
                            <h4><a href="shop.html">Parking Space</a></h4>
                        </div>
                        <div class="ltn__category-item-btn">
                            <a href="shop.html"><i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="ltn__category-item ltn__category-item-4 text-center">
                        <div class="ltn__category-item-img">
                            <a href="shop.html">
                                <i class="flaticon-car"></i>
                            </a>
                        </div>
                        <div class="ltn__category-item-name">
                            <h4><a href="shop.html">Parking Space</a></h4>
                        </div>
                        <div class="ltn__category-item-btn">
                            <a href="shop.html"><i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CATEGORY AREA END -->

    <!-- CATEGORY AREA START -->
    <!-- <div class="ltn__category-area ltn__product-gutter section-bg-1--- pt-115 pb-90 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">Our Aminities</h6>
                        <h1 class="section-title">Building Aminities</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__category-slider-active--- slick-arrow-1 justify-content-center">
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__category-item ltn__category-item-5 text-center">
                        <a href="shop.html">
                            <span class="category-icon"><i class="flaticon-car"></i></span>
                            <span class="category-title">Parking Space</span>
                            <span class="category-btn"><i class="flaticon-right-arrow"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__category-item ltn__category-item-5 text-center">
                        <a href="shop.html">
                            <span class="category-icon"><i class="flaticon-swimming"></i></span>
                            <span class="category-title">Swimming Pool</span>
                            <span class="category-btn"><i class="flaticon-right-arrow"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__category-item ltn__category-item-5 text-center">
                        <a href="shop.html">
                            <span class="category-icon"><i class="flaticon-secure-shield"></i></span>
                            <span class="category-title">Private Security</span>
                            <span class="category-btn"><i class="flaticon-right-arrow"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__category-item ltn__category-item-5 text-center">
                        <a href="shop.html">
                            <span class="category-icon"><i class="flaticon-stethoscope"></i></span>
                            <span class="category-title">Medical Center</span>
                            <span class="category-btn"><i class="flaticon-right-arrow"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__category-item ltn__category-item-5 text-center">
                        <a href="shop.html">
                            <span class="category-icon"><i class="flaticon-book"></i></span>
                            <span class="category-title">Library Area</span>
                            <span class="category-btn"><i class="flaticon-right-arrow"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__category-item ltn__category-item-5 text-center">
                        <a href="shop.html">
                            <span class="category-icon"><i class="flaticon-bed-1"></i></span>
                            <span class="category-title">King Size Beds</span>
                            <span class="category-btn"><i class="flaticon-right-arrow"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__category-item ltn__category-item-5 text-center">
                        <a href="shop.html">
                            <span class="category-icon"><i class="flaticon-home-2"></i></span>
                            <span class="category-title">Smart Homes</span>
                            <span class="category-btn"><i class="flaticon-right-arrow"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__category-item ltn__category-item-5 text-center">
                        <a href="shop.html">
                            <span class="category-icon"><i class="flaticon-slider"></i></span>
                            <span class="category-title">Kid’s Playland</span>
                            <span class="category-btn"><i class="flaticon-right-arrow"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- CATEGORY AREA END -->

    <!-- TESTIMONIAL AREA START (testimonial-7) -->
    <div class="ltn__testimonial-area section-bg-1--- bg-image-top pt-115 pb-70" data-bs-bg="img/bg/20.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">Our Testimonial</h6>
                        <h1 class="section-title">Khách hàng Feedback</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__testimonial-slider-5-active slick-arrow-1">
                <div class="col-lg-4">
                    <div class="ltn__testimonial-item ltn__testimonial-item-7">
                        <div class="ltn__testimoni-info">
                            <p><i class="flaticon-left-quote-1"></i>
                               Từ khi biết đến nhà đất 3 miền thì hệ thống này giúp tôi tìm kiếm khách hàng tốt hơn</p>
                            <div class="ltn__testimoni-info-inner">
                                <div class="ltn__testimoni-img">
                                    <img src="/System/Home/img/testimonial/1.jpg" alt="#">
                                </div>
                                <div class="ltn__testimoni-name-designation">
                                    <h5>Đỗ Nam Trung</h5>
                                    <label>Nhà môi giới</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ltn__testimonial-item ltn__testimonial-item-7">
                        <div class="ltn__testimoni-info">
                            <p><i class="flaticon-left-quote-1"></i>
                              Trước kia việc mua nhà rất khó khăn , để mua được nhà phải trải qua rất nhiều môi giới từ đó tốn rất nhiều chi phí , sau khi tham gia vào hệ thống này thì tôi đã tìm được nhà ưng ý</p>
                            <div class="ltn__testimoni-info-inner">
                                <div class="ltn__testimoni-img">
                                    <img src="/System/Home/img/testimonial/2.jpg" alt="#">
                                </div>
                                <div class="ltn__testimoni-name-designation">
                                    <h5>Nguyễn Văn TÝ</h5>
                                    <label>Khách hàng</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ltn__testimonial-item ltn__testimonial-item-7">
                        <div class="ltn__testimoni-info">
                            <p><i class="flaticon-left-quote-1"></i>
                                Precious ipsum dolor sit amet
                                consectetur adipisicing elit, sed dos
                                mod tempor incididunt ut labore et
                                dolore magna aliqua. Ut enim ad min
                                veniam, quis nostrud Precious ips
                                um dolor sit amet, consecte</p>
                            <div class="ltn__testimoni-info-inner">
                                <div class="ltn__testimoni-img">
                                    <img src="/System/Home/img/testimonial/3.jpg" alt="#">
                                </div>
                                <div class="ltn__testimoni-name-designation">
                                    <h5>Adam Joseph</h5>
                                    <label>Selling Agents</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ltn__testimonial-item ltn__testimonial-item-7">
                        <div class="ltn__testimoni-info">
                            <p><i class="flaticon-left-quote-1"></i>
                                Precious ipsum dolor sit amet
                                consectetur adipisicing elit, sed dos
                                mod tempor incididunt ut labore et
                                dolore magna aliqua. Ut enim ad min
                                veniam, quis nostrud Precious ips
                                um dolor sit amet, consecte</p>
                            <div class="ltn__testimoni-info-inner">
                                <div class="ltn__testimoni-img">
                                    <img src="img/testimonial/4.jpg" alt="#">
                                </div>
                                <div class="ltn__testimoni-name-designation">
                                    <h5>James Carter</h5>
                                    <label>Selling Agents</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
            </div>
        </div>
    </div>
    <!-- TESTIMONIAL AREA END -->

    <!-- BRAND LOGO AREA START -->
    <div class="ltn__brand-logo-area ltn__brand-logo-1 section-bg-1 pt-290 pb-110 plr--9 d-none">
        <div class="container-fluid">
            <div class="row ltn__brand-logo-active">
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="img/brand-logo/1.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="img/brand-logo/2.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="img/brand-logo/3.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="img/brand-logo/4.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="img/brand-logo/5.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="img/brand-logo/3.png" alt="Brand Logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BRAND LOGO AREA END -->


    <x-home.index.news-list></x-home.index.news-list>
    <!-- CALL TO ACTION START (call-to-action-6) -->
{{--    <div class="ltn__call-to-action-area call-to-action-6 before-bg-bottom" data-bs-bg="img/1.jpg--">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="call-to-action-inner call-to-action-inner-6 ltn__secondary-bg position-relative text-center---">--}}
{{--                        <div class="coll-to-info text-color-white">--}}
{{--                            <h1>Looking for a dream home?</h1>--}}
{{--                            <p>We can help you realize your dream of a new home</p>--}}
{{--                        </div>--}}
{{--                        <div class="btn-wrapper">--}}
{{--                            <a class="btn btn-effect-3 btn-white" href="contact.html">Explore Properties <i class="icon-next"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- CALL TO ACTION END -->

@endsection
@section('Script')
    <script src="{{asset('System/Home/js/main.js')}}"></script>
    @endsection
