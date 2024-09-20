@extends('Admin.Layouts.Master')
@section('Content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Nhóm quản trị</h4>
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
                    <a href="{{ route('admin.staff.add_group') }}" class="btn btn-primary mb-5 ml-3">Thêm</a>
                    <div class="pb-20">
                        <table style="width: 100%" class="data-table table stripe hover nowrap">
                            <thead>
                                <tr>
                                    <th class="table-plus">Tên nhóm</th>
                                    <th>Loại admin</th>
                                    <th class="datatable-nosort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($param['role'] as $item)
                                    <tr>
                                        <td class="table-plus">{{ $item->role_name ?? "Tài khoản đã xóa" }}</td>
                                        <td>{{ $item->admin_type == 1 ? "Quản trị cao cấp" : "Admin thường" }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item" data-id="{{ $item->id }}" href="{{ route('admin.staff.edit_group', $item->id) }}"><i class="dw dw-pencil"></i> Chỉnh sửa</a>
                                                    <a class="dropdown-item delete-item" data-id="{{ $item->id }}" href="javascript:void(0)"><i class="dw dw-delete-3"></i> Xóa</a>
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
        $('.delete-item').click(function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Xóa nhóm',
                text: "Sau khi đồng ý sẽ tiến hành xóa nhóm",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Hủy',
                confirmButtonText: 'Đồng ý'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ route('admin.staff.delete_group', '') }}/' + id;
                }
            })
        });
    </script>
@endsection
