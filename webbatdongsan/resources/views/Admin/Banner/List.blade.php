@extends('Admin.Layouts.Master')
@section('Content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Danh sách</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:{}">Home</a></li>
                                    <li href="javascript:{}" class="breadcrumb-item active" aria-current="page">Danh sách</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Simple Datatable start -->
                <div class="card-box mb-30 pt-30">
                    <a href="{{route('admin.banner.add')}}" class=" ml-2 mb-3 btn btn-primary">Thêm</a>
                    <div class="pb-20">
                        <table style="width: 100%" class="data-table table stripe hover">
                            <thead>
                            <tr>
                                <th  class="table-plus">STT</th>
                                <th>Ảnh</th>
                                <th style="width: 30%">Link</th>
                                <th>Người đăng</th>
                                <th>Ngày đăng</th>
                                <th>Tình trạng</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($param['list'] as $key => $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><img style="max-width: 200px" src="{{asset($item->banner_image)}}" ></td>
                                    <td>{{$item->banner_link}}</td>
                                    <td>{{$item->admin->admin_fullname}}</td>
                                    <td>{{date('d/m/Y',$item->created_at)}}</td>
                                    <td>

                                      @if($item->is_show == 0)
                                            <span class="text-danger">Ẩn</span>
                                        @else
                                            <span class="text-success">Hiển thị</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                                    @if($item->is_show == 0 )
                                                        <a class="dropdown-item unblock-display" data-id="{{$item->id}}" href="javascript:{}"><i class="dw dw-eye"></i> Hiển thị</a>
                                                    @else
                                                        <a class="dropdown-item block-display"  data-id="{{$item->id}}" href="javascript:{}"><i class="icon-copy dw dw-ban"></i>Chặn hiển thị</a>
                                                    @endif
                                                    <a class="dropdown-item" href="{{route('admin.banner.edit',$item->id)}}"><i class="dw dw-edit2"></i>Chỉnh sửa</a>

                                                    <a class="dropdown-item delete-item"  data-id="{{$item->id}}" href="javascript:{}"><i class="dw dw-delete-3"></i>Xóa</a>

                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
@section('Script')
    <script src="{{asset('System/Admin/vendors/scripts/datatable-setting.js')}}"></script>
    <script>
        $('.block-display').click(function (){
            var id = $(this).data('id');
            Swal.fire({
                title: 'Chặn hiển thị',
                text: "Sau khi đồng ý sẽ tiến hành chặn hiển thị",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Hủy',
                confirmButtonText: 'Đồng ý'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href='{{route('admin.banner.block','')}}/'+id;
                }
            })
        });
        $('.unblock-display').click(function (){
            var id = $(this).data('id');
            Swal.fire({
                title: 'Hiển thị',
                text: "Sau khi đồng ý sẽ tiến hành hiển thị",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Hủy',
                confirmButtonText: 'Đồng ý'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href='{{route('admin.banner.unblock','')}}/'+id;
                }
            })
        });

        $('.delete-item').click(function (){
            var id = $(this).data('id');
            Swal.fire({
                title: 'Xóa banner',
                text: "Sau khi đồng ý sẽ không thể khôi phục",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Hủy',
                confirmButtonText: 'Đồng ý'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href='{{route('admin.banner.delete','')}}/'+id;
                }
            })
        });

        $('.restore-item').click(function (){
            var id = $(this).data('id');
            Swal.fire({
                title: 'Khôi phục dự án',
                text: "Sau khi đồng ý sẽ tiến hành khôi phục",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Hủy',
                confirmButtonText: 'Đồng ý'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href='{{route('admin.focus.restore','')}}/'+id;
                }
            })
        });

    </script>

@endsection
