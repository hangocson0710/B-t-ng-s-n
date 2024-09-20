@extends('Home.Layouts.Master')
@section('Content')
    <div class="liton__wishlist-area pb-70">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
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
                                                                <th scope="col">STT</th>
                                                                <th scope="col">Tên KH</th>
                                                                <th scope="col">Tin quan tâm</th>
                                                                <th scope="col">Số điện thoại</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($param['user'] as $key => $item)
                                                                <tr>
                                                                    <td>{{ $key + 1 }}</td>
                                                                    <td>{{ $item->user->fullname }}</td>
                                                                    <td>{{ $item->classified->classified_title }}</td>
                                                                    <td>{{ $item->user->phone }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                {{ $param['user']->render('Home.Layouts.Paginate') }}
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
    <script src="{{ asset('System/param.js') }}"></script>
@endsection
