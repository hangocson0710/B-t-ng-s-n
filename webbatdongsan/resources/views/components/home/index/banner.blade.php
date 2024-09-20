<!-- SLIDER AREA START (slider-3) -->
<div class="ltn__slider-area ltn__slider-3  section-bg-1">
    <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1">

    @foreach($banner as $item)
        <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-3-normal ltn__slide-item-3">
            <div class="ltn__slide-item-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 align-self-center">
{{--                            <div class="slide-item-info">--}}
{{--                                <div class="slide-item-info-inner ltn__slide-animation">--}}
{{--                                    <div class="slide-video mb-50 d-none">--}}
{{--                                        <a class="ltn__video-icon-2 ltn__video-icon-2-border" href="https://www.youtube.com/embed/tlThdr3O5Qo" data-rel="lightcase:myCollection">--}}
{{--                                            <i class="fa fa-play"></i>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <h6 class="slide-sub-title white-color--- animated"><span><i class="fas fa-home"></i></span> Real Estate Agency</h6>--}}
{{--                                    <h1 class="slide-title animated ">Find Your Dream <br> House By Us</h1>--}}
{{--                                    <div class="slide-brief animated">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="btn-wrapper animated">--}}
{{--                                        <a href="about.html" class="theme-btn-1 btn btn-effect-1">Make An Enquiry</a>--}}
{{--                                        <a class="ltn__video-play-btn bg-white" href="https://www.youtube.com/embed/HnbMYzdjuBs?autoplay=1&amp;showinfo=0" data-rel="lightcase">--}}
{{--                                            <i class="icon-play  ltn__secondary-color"></i>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div   class="">
                               <a href="{{$item->banner_link}}" target="_blank">
                                   <img src="{{asset($item->banner_image)}}" alt="#">
                               </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
<!-- SLIDER AREA END -->
