@extends('Admin.Layouts.Master')
@section('Content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Danh sách tài khoản doanh nghiệp</h4>
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
                                <th class="table-plus">STT</th>
                                <th>Người đại diện</th>
                                <th>Tên Công ty</th>
                                <th>Ảnh GPKD</th>
                                <th>Trạng thái</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($param['list'] as $key => $item)
                                <tr>
                                    <td class="table-plus">{{ $key + 1 }}</td>
                                    <td>{{ $item->fullname }}</td>
                                    <td>{{ $item->business_name }}</td>
                                    <td><button class="btn btn-outline-info view-license" data-image="{{ asset($item->license) }}">Xem</button></td>
                                    <td>
                                        @if($item->is_deleted == 1)
                                            <span class="text-warning">Đã xóa</span>
                                        @elseif($item->is_forbidden == 1)
                                            <span class="text-warning">Bị cấm</span>
                                        @elseif($item->is_block == 1 && $item->block_time > time())
                                            <span class="text-danger">Bị chặn</span>
                                        @else
                                            <span class="text-success">Hoạt động</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                @if($item->is_block == 0 || $item->block_time < time())
                                                    <a class="dropdown-item block" data-id="{{ $item->id }}" href="javascript:{}"><i class="icon-copy dw dw-ban"></i> Chặn</a>
                                                @endif
                                                @if($item->is_forbidden == 0)
                                                    <a class="dropdown-item forbidden" data-id="{{ $item->id }}" href="javascript:{}"><i class="icon-copy dw dw-ban"></i> Cấm</a>
                                                @endif
                                                <!-- @if($item->is_deleted == 0)
                                                    <a class="dropdown-item delete" data-id="{{ $item->id }}" href="javascript:{}"><i class="icon-copy dw dw-remove-1"></i> Xóa</a>
                                                @endif -->
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Giấy phép kinh doanh</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img id="preview-license" src="">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Simple Datatable end -->
            </div>
        </div>
    </div>
@endsection
@section('Script')
    <script src="{{ asset('System/Admin/vendors/scripts/datatable-setting.js') }}"></script>
    <script>
        $('.block').click(function (){
            var id = $(this).data('id');
            Swal.fire({
                title: 'Chặn tài khoản',
                text: "Sau khi đồng ý sẽ chặn 7 ngày tài khoản",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Hủy',
                confirmButtonText: 'Đồng ý'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href='{{ route('admin.user.block', '') }}/' + id;
                }
            })
        });

        $('.forbidden').click(function (){
            var id = $(this).data('id');
            Swal.fire({
                title: 'Cấm tài khoản',
                text: "Sau khi đồng ý sẽ cấm tài khoản",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Hủy',
                confirmButtonText: 'Đồng ý'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href='{{ route('admin.user.forbidden', '') }}/' + id;
                }
            })
        });

        $('.delete').click(function (){
            var id = $(this).data('id');
            Swal.fire({
                title: 'Xóa tài khoản',
                text: "Sau khi đồng ý sẽ xóa tài khoản",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Hủy',
                confirmButtonText: 'Đồng ý'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href='{{ route('admin.user.delete', '') }}/' + id;
                }
            })
        });

        $('.view-license').click(function (){
            var image = $(this).data('image');
            $('#preview-license').attr('src', image);
            $('.modal').modal('show');
        });
    </script>
@endsection
