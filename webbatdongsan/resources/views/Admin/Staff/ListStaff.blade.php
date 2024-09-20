@extends('Admin.Layouts.Master')
@section('Content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Quản lý nhân viên</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.staff.list') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Simple Datatable start -->
                <div class="card-box mb-30 pt-30">
                    <a href="{{ route('admin.staff.add_staff') }}" class="btn btn-primary mb-5 ml-3">Thêm</a>
                    <div class="pb-20">
                        <table style="width: 100%" class="data-table table stripe hover nowrap">
                            <thead>
                                <tr>
                                    <th class="table-plus">STT</th>
                                    <th>Tài khoản</th>
                                    <th>Họ tên</th>
                                    <th>Ảnh</th>
                                    <th>Email</th>
                                    <th>Quyền</th>
                                    <th>Trạng thái</th>
                                    <th class="datatable-nosort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($param['list'] as $key => $item)
                                    <tr>
                                        <td class="table-plus">{{ $key + 1 }}</td>
                                        <td>{{ $item->admin_username }}</td>
                                        <td>{{ $item->admin_fullname }}</td>
                                        <td><img style="width: 70px" src="{{ asset($item->admin_image) }}"> </td>
                                        <td>{{ $item->admin_email }}</td>
                                        <td>{{ $item->role ? $item->role->role_name : 'N/A' }}</td>
                                        <td>{{ $item->is_active == 1 ? "Hoạt động" : "Bị cấm" }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item" href="{{ route('admin.staff.edit_staff', $item->id) }}"><i class="dw dw-pencil"></i> Chỉnh sửa</a>
                                                    @if($item->is_active == 1)
                                                        <a class="dropdown-item browse" href="javascript:void(0)" data-id="{{ $item->id }}"><i class="icon-copy dw dw-ban"></i> Hủy kích hoạt</a>
                                                    @else
                                                        <a class="dropdown-item no-browse" href="javascript:void(0)" data-id="{{ $item->id }}"><i class="icon-copy dw dw-check"></i> Kích hoạt</a>
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
    <script src="{{ asset('System/Admin/vendors/scripts/datatable-setting.js') }}"></script>
    <script>
        $('.browse').click(function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Hủy kích hoạt',
                text: "Sau khi đồng ý sẽ tiến hành hủy kích hoạt tài khoản",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Hủy',
                confirmButtonText: 'Đồng ý'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ route('admin.staff.block', '') }}/' + id;
                }
            })
        });

        $('.no-browse').click(function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Kích hoạt',
                text: "Sau khi đồng ý sẽ tiến hành kích hoạt tài khoản",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Hủy',
                confirmButtonText: 'Đồng ý'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ route('admin.staff.unblock', '') }}/' + id;
                }
            })
        });
    </script>
@endsection
