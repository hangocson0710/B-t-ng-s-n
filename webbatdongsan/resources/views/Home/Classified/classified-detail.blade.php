@extends('Home.Layouts.Master')
@section('Content')
    <!-- BREADCRUMB AREA START -->
    <div class=" text-left bg-overlay-white-30 bg-image mb-0"  data-bs-bg="img/bg/14.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="/"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>Chi tiết tin</li>
                        </ul>
                    </div>
                    <div class="ltn__breadcrumb-inner">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- IMAGE SLIDER AREA START (img-slider-3) -->
    <div class="ltn__img-slider-area mb-90">
        <div class="container-fluid">
            <div class="row ltn__image-slider-5-active slick-arrow-1 slick-arrow-1-inner ">
                @foreach(json_decode($param['classified']->classified_image) as $key => $i )
                <div class="col-lg-12 container-img-detail">
                    <div class="ltn__img-slide-item-{{$key}}">
                        <a  href="img/img-slide/31.jpg" data-rel="lightcase:myCollection">
                            <img class="hinh-anh-chi-tiet" src="{{$i}}" alt="Image">
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- IMAGE SLIDER AREA END -->

    <!-- SHOP DETAILS AREA START -->
    <div class="ltn__shop-details-area pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="ltn__shop-details-inner ltn__page-details-inner mb-60">
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-category">
                                    <a href="{{route('danh-sach-tin',$param['classified']->group->group_url)}}">{{$param['classified']->group->group_name}}</a>
                                </li>
                                <li class="ltn__blog-category">
                                    <a class="bg-orange" href="#">{{$param['classified']->group->parent_id ==1?"Bán":"Thuê"}}</a>
                                </li>
                                <li class="ltn__blog-date">
                                    <i class="far fa-calendar-alt"></i>{{date('d/m/Y',$param['classified']->created_at)}}
                                </li>
                                <li>
                                    <a href="#"><i class="far fa-comments"></i>{{$param['classified']->comment->count()}} Bình luận</a>
                                </li>
                            </ul>
                        </div>
                        <h1>{{$param['classified']->classified_title}}</h1>
                        <label><span class="ltn__secondary-color"><i class="flaticon-pin"></i></span> {{$param['classified']->classified_address}}, {{ optional($param['classified']->ward)->ward_name }}, {{ optional($param['classified']->district)->district_name }}, {{ optional($param['classified']->province)->province_name }}</label>
                        <h4 class="title-2">Nội dung</h4>
                        <p>{!! $param['classified']->classified_content !!}</p>
                        <h4 class="title-2">Chi tiết</h4>
                        <div class="property-detail-info-list section-bg-1 clearfix mb-60">
                            <ul>
                                <li><label>Giá: </label> <span>{{number_format($param['classified']->classified_price,0,'',',')}} {{$param['classified']->price->unit_name}}</span></li>
                                <li><label>Phòng ngủ:</label> <span>{{$param['classified']->bed->param_name}}</span></li>
                                <li><label>Loại tin:</label> <span>{{$param['classified']->group->parent_id ==1 ?"Cần bán":"Cần cho thuê"}}</span></li>
                                <li><label>Thuộc dự án:</label> <span>{{$param['classified']->project->project_name??"---"}}</span></li>
                            </ul>
                            <ul>
                                <li><label>Diện tích:</label> <span>{{number_format($param['classified']->classified_area,0,'',',')}} {{$param['classified']->area->unit_name}} </span></li>
                                <li><label>Phòng vệ sinh:</label> <span>{{$param['classified']->toilet->param_name}}</span></li>
                                <li><label>Địa chỉ:</label> <span>{{$param['classified']->classified_address}} <br> {{ optional($param['classified']->ward)->ward_name }} {{ optional($param['classified']->district)->district_name }} {{ optional($param['classified']->province)->province_name }}</span></li>
                            </ul>
                        </div>
                    @if(\Illuminate\Support\Facades\Auth::check()==false||$param['classified']->user_id != Auth::user()->id)
                        <div class="mb-5">
                            <?php
                            $check_sign = \Illuminate\Support\Facades\DB::table('classified_care')
                            ->where('classified_id',$param['classified']->id)
                            ->where('user_id',Auth::user()->id ?? -1)->first();
                            ?>
                        </div>
                    @endif
                        <div class="ltn__shop-details-tab-content-inner--- ltn__shop-details-tab-inner-2 ltn__product-details-review-inner mb-60">
                            <h4 class="title-2">Bình luận</h4>
                            <hr>
                            <!-- comment-area -->
                            <div class="ltn__comment-area mb-30">
                                <div class="ltn__comment-inner">
                                    <ul>
                                        @forelse($param['classified']->comment as $i)
                                        <li>
                                            <div class="ltn__comment-item clearfix">
                                                <div class="ltn__commenter-img">
                                                    <img src="{{asset($i->user->avatar)}}" alt="Image">
                                                </div>
                                                <div class="ltn__commenter-comment">
                                                    <h6><a href="#">{{$i->user->fullname}}</a>
                                                        @if((Auth::user()->id??-1) == $param['classified']->user_id || (Auth::user()->id??-1) == $i->user_id )
                                                        <a href="javascript:{}" style="font-size: 70%"  class="text-white delete-comment bg-danger" data-id="{{$i->id}}"><i class="icon-remove"></i> Xóa</a>
                                                        @endif
                                                    </h6>
                                                    <p>{{$i->comment_content}}</p>
                                                    <span class="ltn__comment-reply-btn">{{date('d/m/Y H:i',$i->created_at)}}</span>
                                                </div>
                                            </div>
                                        </li>
                                        @empty
                                            <p>Chưa có bình luận</p>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                            <!-- comment-reply -->
                            <div class="ltn__comment-reply-area ltn__form-box mb-30">
                               @if(\Illuminate\Support\Facades\Auth::check())
                                <form action="{{route('them-binh-luan-tin-rao',$param['classified']->id)}}" method="post">
                                  @csrf
                                    <h4>Thêm bình luận</h4>
                                    <div class="mb-30">
                                        <div class="add-a-review">
                                        </div>
                                    </div>
                                    <div class="input-item input-item-textarea ltn__custom-icon">
                                        <textarea name="comment_content" placeholder="Nhập bình luận....">{{old('comment_content')}}</textarea>
                                    @if($errors->count()>0 && $errors->has('comment_content'))
                                       <span class="text-danger">{{$errors->first('comment_content')}}</span>
                                        @endif
                                    </div>
                                    <div class="btn-wrapper">
                                        <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">ĐĂNG</button>
                                    </div>
                                </form>
                                @else
                                    <p>Để bình luận vui lòng đăng nhập, <a href="{{route('dang-nhap')}}">ĐĂNG NHẬP NGAY</a></p>
                                @endif
                            </div>
                        </div>

                        <h4 class="title-2">Cùng chuyên mục</h4>
                        <div class="row">
                            @foreach($param['classified_group'] as $item)
                                <x-home.classified.item-col :item="$item"></x-home.classified.item-col>
                            @endforeach
                            <!-- ltn__product-item -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar---">
                        <!-- Author Widget -->
                        <div class="widget ltn__author-widget">
                            <div class="ltn__author-widget-inner text-center">
                                <img src="{{asset($param['classified']->user->avatar)}}" alt="Image">
                                <h5>{{$param['classified']->user->user_type == 1?$param['classified']->user->fullname:$param['classified']->user->business_name}}</h5>
                                <h6>Liên hệ: {{$param['classified']->user->phone}}</h6>
                            </div>
                        </div>

                        <!-- Menu Widget (Category) -->
                        <div class="widget ltn__menu-widget ltn__menu-widget-2--- ltn__menu-widget-2-color-2---">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">Danh mục</h4>
                            <ul>
                                @foreach($param['group'] as $i)
                                <li><a href="{{$i->group_url}}">{{$i->group_name}} <span>({{$i->group_classified->count()}})</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP DETAILS AREA END -->

@endsection
@section('Script')
    <script src="{{asset('System/Home/js/main.js')}}"></script>
    <script>
        $('.sign-up-classified').click(function (){
            var id = $(this).data('id');
            Swal.fire({
                title: 'Yêu cầu liên hệ lại',
                text: "Sau khi đồng ý sẽ đăng kí nhận thông tin từ tin đăng này",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Hủy',
                confirmButtonText: 'Đồng ý'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href='{{route('dang-ki-nhan-tin','')}}/'+id;
                }
            })
        });
        $('.delete-comment').click(function (){
            var id = $(this).data('id');
            Swal.fire({
                title: 'Xác nhận xóa bình luận này',
                text: "Sau khi xóa thì không thể khôi phục",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Hủy',
                confirmButtonText: 'Đồng ý'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href='{{route('xoa-binh-luan-tin-rao','')}}/'+id;
                }
            })
        });
        $('.close_modal').click(function (){
            var id = $(this).data('id');
            $(id).modal('hide');
        });
        $('.close_modal_comment').click(function (){
            var id = $(this).data('id');
            $(id).modal('hide');
        });
    </script>
@endsection
