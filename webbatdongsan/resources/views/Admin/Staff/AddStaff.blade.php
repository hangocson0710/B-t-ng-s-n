@extends('Admin.Layouts.Master')
@section('Content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Thêm tài khoản quản trị</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <!-- Sửa lại liên kết breadcrumb để sử dụng route helper -->
                                    <li class="breadcrumb-item"><a href="{{ route('admin.staff.add_staff') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thêm tài khoản quản trị</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Simple Datatable start -->
                <div class="card-box mb-30 pt-30">
                    <div class="pb-20">
                        <form action="{{ route('admin.staff.add_staff') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Họ tên</label>
                                        <input type="text" name="admin_fullname" class="form-control" value="{{ old('admin_fullname') }}">
                                        @if($errors->has('admin_fullname'))
                                            <span class="text-danger">{{ $errors->first('admin_fullname') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="admin_email" class="form-control" value="{{ old('admin_email') }}">
                                        @if($errors->has('admin_email'))
                                            <span class="text-danger">{{ $errors->first('admin_email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input type="text" name="admin_phone" class="form-control" value="{{ old('admin_phone') }}">
                                        @if($errors->has('admin_phone'))
                                            <span class="text-danger">{{ $errors->first('admin_phone') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Tên đăng nhập</label>
                                        <input type="text" name="admin_username" class="form-control" value="{{ old('admin_username') }}">
                                        @if($errors->has('admin_username'))
                                            <span class="text-danger">{{ $errors->first('admin_username') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input type="password" name="password" class="form-control">
                                        @if($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Nhập lại mật khẩu</label>
                                        <input type="password" name="password_confirmation" class="form-control">
                                        @if($errors->has('password_confirmation'))
                                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Hình ảnh</label>
                                        <input type="file" name="admin_image" class="form-control">
                                        @if($errors->has('admin_image'))
                                            <span class="text-danger">{{ $errors->first('admin_image') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Vai trò</label>
                                        <select name="role" class="form-control">
                                            <option value="">Chọn vai trò</option>
                                            @foreach($param['role'] as $role)
                                                <option value="{{ $role->id }}" {{ old('role') == $role->id ? "selected" : "" }}>{{ $role->role_name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('role'))
                                            <span class="text-danger">{{ $errors->first('role') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 mt-3 text-center">
                                    <button type="submit" class="btn btn-success">Thêm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Simple Datatable end -->
            </div>
        </div>
    </div>
@endsection
