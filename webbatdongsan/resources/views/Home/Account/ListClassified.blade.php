@extends('Home.Layouts.Master')
@section('Content')
    <div class="liton__wishlist-area pb-70">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <!-- PRODUCT TAB AREA START -->
                    <div class="ltn__product-tab-area">
                        <div class="container-fluid">
                            <div class="row">
                                <x-home.account.side-bar></x-home.account.side-bar>
                                <div class="col-lg-9">
                                    <div class="">
                                        <div class="" id="">
                                            <div class="ltn__myaccount-tab-content-inner">
                                                <div class="ltn__my-properties-table table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Thông tin</th>
                                                            <th scope="col"></th>
                                                            <th scope="col">Ngày đăng</th>
                                                            <th scope="col">Trạng thái</th>
                                                            <th scope="col">Loại tin</th>

                                                            <th scope="col">Thao tác</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                     @foreach($param['classified'] as $item)
                                                        <tr>
                                                            <td class="ltn__my-properties-img">
                                                                <a href="#"><img src="{{json_decode($item->classified_image)[0]}}" alt="#"></a>
                                                            </td>
                                                            <td>
                                                                <div class="ltn__my-properties-info">
                                                                    <h6 class="mb-10"><a target="_blank" href="{{route('chi-tiet-tin',$item->classified_url)}}">{{$item->classified_title}}</a></h6>
                                                                    <small><i class="icon-placeholder"></i> {{$item->classified_address}} {{$item->district_name}} {{$item->province_name}}</small>
                                                                    <div class="product-ratting">
                                                                        <ul>
                                                                            <li class="review-total"> <a href="#"> ( {{$item->comment->count()}} Bình luận )</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td>{{date('d/m/Y',$item->created_at)}}</td>
                                                            <td>
                                                                @if($item->is_block ==1)
                                                                    <span  class="text-danger">Bị cấm</span>
                                                                    @else
                                                                    <span class="text-success">Hiển thị</span>
                                                                    @endif
                                                            </td>
                                                            <td>{{$item->is_vip ==1 && $item->vip_time>=time()?"VIP":"THƯỜNG"}}</td>
                                                            <td>
                                                                <a class="" href="{{route('edit',$item->id)}}"><i class="fa-solid fa-pen"></i>Chỉnh sửa</a>
                                                                @if($item->is_deleted == 0 )
                                                                <a class="dropdown-item delete-item" data-id="{{$item->id}}" href="javascript:{}"><i class="fa-solid fa-trash-can"></i>Xóa</a>
                                                                @else
                                                                <a class="dropdown-item restore-item"  data-id="{{$item->id}}" href="javascript:{}"><i class="icon-copy dw dw-refresh2"></i>Khôi phục</a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                     @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                {{$param['classified']->render('Home.Layouts.Paginate')}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- PRODUCT TAB AREA END -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('Script')
    <script src="{{asset('System/Admin/vendors/scripts/datatable-setting.js')}}"></script>
    <script src="{{asset('System/param.js')}}"></script>
    <script>
        {{--$(document).ready(function (){--}}
        {{--    var district ='{{$param['user']->user_detail->district_id}}';--}}
        {{--    get_district('#province_id','#district_id','{{route('param.district','')}}',district);--}}
        {{--    setTimeout(()=>{--}}
        {{--        get_ward('#district_id','#ward_id','{{route('param.ward','')}}','{{$param['user']->user_detail->ward_id}}');--}}

        {{--    },1000)--}}
        {{--});--}}
        function previewMutiple(event){
            var input = document.getElementById("input-img");
            $('#old').hide();
            var preview = input.files.length;
            document.getElementById("preview-img").innerHTML ='';
            var urls = URL.createObjectURL(event.target.files[0]);
            $('#preview-img').show();
            document.getElementById("preview-img").innerHTML += '<img src="'+urls+'">';
        }

        $('.delete-item').click(function (){
        var id = $(this).data('id');
        Swal.fire({
            title: 'Xóa tin rao',
            text: "Sau khi đồng ý sẽ tiến hành xóa",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Hủy',
            confirmButtonText: 'Đồng ý'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href='{{route('delete','')}}/'+id;
            }
        })
    });

    $('.restore-item').click(function (){
        var id = $(this).data('id');
        Swal.fire({
            title: 'Khôi phục tin rao',
            text: "Sau khi đồng ý sẽ tiến hành khôi phục",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Hủy',
            confirmButtonText: 'Đồng ý'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href='{{route('restore','')}}/'+id;
            }
        })
    });


    </script>
@endsection
