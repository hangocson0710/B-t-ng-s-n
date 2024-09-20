@extends('Admin.Layouts.Master')
@section('Content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Danh sách duyệt tài khoản doanh nghiệp</h4>
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
                                    <td>
                                        <button class="btn btn-outline-info view-license" 
                                            data-image="{{ asset($item->license) }}">Xem
                                        </button>
                                    </td>
                                    <td>
                                        {{ $item->is_active == 1 ? "Đã duyệt" : "" }}
                                        {{ $item->is_active == 0 ? "Đang chờ duyệt" : "" }}
                                        {{ $item->is_active == 2 ? "Từ chối" : "" }}
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                @if($item->is_active == 0)
                                                    <a class="dropdown-item no-browse" data-id="{{ $item->id }}" href="javascript:{}"><i class="icon-copy dw dw-ban"></i> Từ chối</a>
                                                    <a class="dropdown-item browse" data-id="{{ $item->id }}" href="javascript:{}"><i class="icon-copy dw dw-check"></i> Duyệt</a>
                                                @endif
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
        $('.browse').click(function (){
            var id = $(this).data('id');
            Swal.fire({
                title: 'Duyệt tài khoản doanh nghiệp',
                text: "Sau khi đồng ý sẽ không thể hoàn tác",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Hủy',
                confirmButtonText: 'Đồng ý'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href='{{ route('admin.user.browse', '') }}/' + id;
                }
            })
        });
        $('.no-browse').click(function (){
            var id = $(this).data('id');
            Swal.fire({
                title: 'Từ chối duyệt',
                text: "Sau khi đồng ý thì không thể hoàn tác",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Hủy',
                confirmButtonText: 'Đồng ý'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href='{{ route('admin.user.no_browse', '') }}/' + id;
                }
            })
        });
        $('.view-license').click(function (){
            var image = $(this).data('image');
            $('#preview-license').attr('src', image);
            $('.bd-example-modal-lg').modal('show');
        });
    </script>
@endsection
