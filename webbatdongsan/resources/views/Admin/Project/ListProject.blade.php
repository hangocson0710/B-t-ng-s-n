@extends('Admin.Layouts.Master')
@section('Content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>DỰ ÁN</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Simple Datatable start -->
                <div class="card-box mb-30 pt-30">
                    <div class="pb-20">
                        <table style="width: 100%" class="data-table table stripe hover nowrap">
                            <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Dự án</th>
                                <th>Ảnh</th>
                                <th>Mô hình</th>
                                <th>Người đăng</th>
                                <th>Ngày đăng</th>
                                <th>Trạng thái</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $item)
                            <tr>
                                <td class="table-plus">{{$item->project_name}}</td>
                                <td><img src="{{asset(json_decode($item->project_image)[0])}}" style="width: 100px; height: auto;"></td>
                                <td>{{$item->group->group_name}}</td>
                                <td>{{$item->user->username??"Tài khoản đã xóa"}}</td>
                                <td>{{date('d/m/Y H:i' ,$item->created_at)}}</td>
                                <td>
                                    @if($item->is_deleted == 1)
                                        <span class="text-danger">Đã xóa</span>
                                    @elseif($item->is_show == 0)
                                        <span class="text-danger">Chặn hiển thị</span>
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
            <a class="dropdown-item" href="{{ route('admin.project.show', $item->id) }}"><i class="dw dw-eye"></i> Xem dự án</a>
            @if($item->is_deleted == 0 )
                @if($item->is_show == 0 )
                    <a class="dropdown-item unblock-display" data-id="{{$item->id}}" href="javascript:void(0)"><i class="dw dw-eye"></i> Hiển thị</a>
                @else
                    <a class="dropdown-item block-display"  data-id="{{$item->id}}" href="javascript:void(0)"><i class="icon-copy dw dw-ban"></i>Chặn hiển thị</a>
                @endif
                <a class="dropdown-item" href="{{route('admin.project.edit',$item->id)}}"><i class="dw dw-edit2"></i>Chỉnh sửa</a>
            @endif
            @if($item->is_deleted == 0 )
                <a class="dropdown-item delete-item"  data-id="{{$item->id}}" href="javascript:void(0)"><i class="dw dw-delete-3"></i>Xóa</a>
            @else
                <a class="dropdown-item restore-item"  data-id="{{$item->id}}" href="javascript:void(0)"><i class="icon-copy dw dw-refresh2"></i>Khôi phục</a>
            @endif
        </div>
    </div>
</td>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Simple Datatable end -->
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
                    window.location.href='{{route('admin.project.block_display','')}}/'+id;
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
                    window.location.href='{{route('admin.project.unblock_display','')}}/'+id;
                }
            })
        });

        $('.delete-item').click(function (){
            var id = $(this).data('id');
            Swal.fire({
                title: 'Xóa dự án',
                text: "Sau khi đồng ý sẽ tiến hành xóa",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Hủy',
                confirmButtonText: 'Đồng ý'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href='{{route('admin.project.delete','')}}/'+id;
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
                    window.location.href='{{route('admin.project.restore','')}}/'+id;
                }
            })
        });

    </script>
@endsection
