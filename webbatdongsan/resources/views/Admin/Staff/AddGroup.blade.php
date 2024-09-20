@extends('Admin.Layouts.Master')
@section('Content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Thêm nhóm quản trị</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.staff.add_group') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Simple Datatable start -->
                <div class="card-box mb-30 pt-30">
                    <div class="pb-20">
                        <form action="{{ route('admin.staff.add_group') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-6 pl-5">
                                    <div class="form-group">
                                        <label>Tên nhóm quản trị</label>
                                        <input type="text" name="group_name" class="form-control">
                                        @if($errors->has('group_name'))
                                            <span class="text-danger">{{$errors->first('group_name')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 pl-5">
                                    <label>Chọn quyền quản trị</label>
                                    <div class="row">
                                        @foreach($param['page'] as $page)
                                            <div class="custom-control col-3 custom-checkbox mb-5">
                                                <input type="checkbox" name="page[]" value="{{ $page->id }}" class="custom-control-input" id="customCheck{{ $page->id }}">
                                                <label class="custom-control-label" for="customCheck{{ $page->id }}">{{ $page->page_name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    @if($errors->has('page'))
                                        <span class="text-danger">{{$errors->first('page')}}</span>
                                    @endif
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
