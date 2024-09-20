@extends('Admin.Layouts.Master')
@section('Content')
<div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Danh sách liên hệ</h4>
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
                    {{--                    <a href="{{route('admin.staff.add_staff')}}" class="btn btn-primary mb-5 ml-3">Thêm</a>--}}
                    <div class="pb-20">
                        <table style="width: 100%" class="data-table table stripe hover nowrap">
                            <thead>
                            <tr>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Tin nhắn</th>
                                <th>Bài viết liên hệ</th>
                                <th>Thời gian gửi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->message }}</td>
                                    <td>
                                    @if($contact->classified)
                                        <a href="{{ route('admin.classified.list', $contact->classified->id) }}">
                                            {{ $contact->classified->classified_title }}
                                        </a>
                                    @else
                                        <span>Không có thông tin bài viết</span>
                                    @endif
                                </td>
                                    <td>{{ $contact->created_at->format('Y-m-d H:i:s') }}</td>
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

@section('style')
<style>
    .container {
        padding: 20px;
    }

    .table {
        margin: 20px auto;
        border-collapse: collapse;
        width: 100%;
        max-width: 90%;
    }

    .table th, .table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    .table th {
        background-color: #343a40;
        color: white;
    }

    .table-hover tbody tr:hover {
        background-color: #f2f2f2;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }
</style>
@endsection
