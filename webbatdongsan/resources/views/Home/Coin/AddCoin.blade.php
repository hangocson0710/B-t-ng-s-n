@extends('Home.Layouts.Master')
@section('Content')
    <div class="ltn__slider-area ltn__slider-3  section-bg-1">
        <div class="container">
            <h1 class="section-title text-center">Nạp Coin</h1>
            <div class="card-box mb-30 pt-30">
                <form action="" method="post" enctype="multipart/form-data" multiple="multiple">
                    @csrf
                    <div class="pb-20">
                        <div class="row">
                            <div class="col-4  pl-30">
                                <div class="form-group">
                                    <label>Số coin cần nạp</label>
                                    <input name="coin_amount" type="number"  min="0" class="coin_amount form-control" value="{{old('classified_title')??""}}">
                                    <p >1.000 VNĐ = 1 Coin</p>
                                    @if( $errors->count()>0 && $errors->has('coin_amount'))
                                        <span class="text-danger">{{$errors->first('coin_amount')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-4">

                            </div><div class="col-4">
                                <h5>Thông tin chuyển khoản</h5>
                                <p>Ngân hàng : {{$info->bank_name}}</p>
                                <p>Số tài khoản : {{$info->bank_number}}</p>
                                <p>Người thụ hưởng : {{$info->bank_author}}</p>
                                <p class="">Số tiền cần chuyển : <span class="price_amount"></span></p>
                            </div>
                            <div class="col-12">
                                Cách thức nạp coin :
                                <br>
                                - Sau khi nhập số coin cần nạp thì tiến hành chuyển khoản với nội dung chuyển khoản :"username - số coin"
                                <br>
                                -Sau khi chuyển khoản thành công thì nhấn vào nút đã chuyển khoản
                                <br>
                                 - Chờ từ 15 - 30 phút thì coin sẽ được cộng vào tài khoản
                            </div>

                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn mt-4 btn-success text-center">Đã chuyển khoản</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('Script')
    {{--    <script src="{{asset('System/Admin/vendors/scripts/datatable-setting.js')}}"></script>--}}
    <script src="{{asset('System/param.js')}}"></script>
    <script>
        $('.price_amount').empty();
        $('.price_amount').html($('.coin_amount').val()*1000+" VNĐ");
        $('.coin_amount').on('keyup change',function() {
            // alert($('.coin_amount').val());
                $('.price_amount').empty();
                $('.price_amount').html($('.coin_amount').val()*1000+" VNĐ");



        });
    </script>

@endsection
@section('Style')
    <style>
        .main-image_preview{
            padding: 4px;
            width: 100%;
            max-height: 200px;
            display: flex;
            border: 1px solid black;
        }
        .input-upload label img{
            height: 100%;
            max-height: 90px;
            object-fit: cover;
        }
        .input-upload{
            border: 1px solid black;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 25%;
            height: 100%;
        }
        .input-upload p{
            color: #00bcf2;
            font-weight: 700;
        }
        .input-upload input{
            opacity: 0;
            height: 0px;
        }
        .preview_image {
            padding-left: 20px;
            display: flex;
            overflow: auto;
        }
        .preview_image img {
            height: 100%;
            max-height: 140px;
            margin-left: 5px;
        }
    </style>
@endsection
