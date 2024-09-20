@extends('Home.Layouts.Master')
@section('Content')
    <div class="container">
        <h3 class="text-center">Danh sách yêu thích</h3>
        @if($param['classified']->isEmpty())
            <p class="text-center">Không có bài viết yêu thích nào.</p>
        @else
            <div class="row">
                @foreach($param['classified'] as $classified)
                    <div class="col-md-4 mb-4 d-flex">
                        <div class="card h-100">
                            <img class="card-img-top" src="{{ asset(json_decode($classified->classified_image)[0]) }}" alt="Image">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $classified->classified_title }}</h5>
                                <p class="card-text flex-grow-1">
                                    {{ Str::limit(html_entity_decode(strip_tags($classified->classified_content)), 50, '...') }}
                                </p>
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{ route('chi-tiet-tin', $classified->classified_url) }}" class="btn btn-primary mb-2">Xem chi tiết</a>
                                <form action="{{ route('xoa-yeu-thich', $classified->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Xóa khỏi yêu thích</button>
                                </form>
                                <!-- Nút kích hoạt Modal Liên hệ -->
                                <button class="btn btn-success mt-2" data-toggle="modal" data-target="#contactModal{{$classified->id}}">Liên hệ</button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Liên hệ -->
                    <div class="modal fade" id="contactModal{{$classified->id}}" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel{{$classified->id}}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title contact-modal-title" id="contactModalLabel{{$classified->id}}">Liên hệ</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="contact-info text-center">
                                        <p>Hỗ trợ 24/7</p>
                                        <a href="tel:1800234546" class="btn btn-danger mb-3">1800 234 546</a>
                                        <p>Hoặc</p>
                                    </div>
                                <form action="{{ route('gui-lien-he') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name{{$classified->id}}">Tên</label>
                                            <input type="text" class="form-control" id="name{{$classified->id}}" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email{{$classified->id}}">Email</label>
                                            <input type="email" class="form-control" id="email{{$classified->id}}" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone{{$classified->id}}">Số điện thoại</label>
                                            <input type="text" class="form-control" id="phone{{$classified->id}}" name="phone" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="message{{$classified->id}}">Tin nhắn</label>
                                            <textarea class="form-control" id="message{{$classified->id}}" name="message" rows="3" required></textarea>
                                        </div>
                                        <input type="hidden" name="classified_id" value="{{ $classified->id }}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                        <button type="submit" class="btn btn-primary">Gửi liên hệ</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
@section('Style')
<style>
    .modal-title.contact-modal-title {
        font-size: 2rem;
        font-weight: bold;
        text-align: center;
        width: 100%;
    }
    .contact-info {
        text-align: center;
        margin-bottom: 20px;
    }
    .contact-info .contact-logo img {
        max-width: 80px;
        margin-bottom: 15px;
    }
    .contact-info h5 {
        margin-bottom: 10px;
        font-size: 1.25rem;
    }
    .contact-info p {
        margin-bottom: 5px;
        color: #666;
    }
    .contact-info .btn-danger {
        background-color: #d9534f;
        border-color: #d43f3a;
    }
</style>
@endsection