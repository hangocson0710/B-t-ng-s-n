<div class="col-lg-3">
    <div class="ltn__tab-menu-list mb-50">
        <div class="nav">
            <!-- <a class=""  href="#ltn_tab_1_1">Dashboard <i class="fas fa-home"></i></a> -->
            <a class="{{url()->full() == route('cap-nhat-thong-tin')?"active show":""}}" href="{{route('cap-nhat-thong-tin')}}">Thông tin <i class="fas fa-user"></i></a>
            <a class="{{url()->full() == route('tin-rao-da-dang')?"active show":""}}" href="{{route('tin-rao-da-dang')}}">Danh sách bài viết <i class="fas fa-map-marker-alt"></i></a>
            <a class="{{url()->full() == route('danh-sach-khach-hang')?"active show":""}}"  href="{{route('danh-sach-khach-hang')}}">Danh sách khách hàng<i class="fas fa-user"></i></a>
            <a class="{{ url()->full() == route('danh-sach-yeu-thich') ? 'active show' : '' }}" href="{{ route('danh-sach-yeu-thich') }}">Yêu thích <i class="fa-solid fa-heart"></i></a>
            <a class="{{url()->full() == route('doi-mat-khau')?"active show":""}}"  href="{{route('doi-mat-khau')}}">Đổi mật khẩu<i class="fa-solid fa-list"></i></a>

            <a href="{{route('dang-xuat')}}">Đăng xuất <i class="fas fa-sign-out-alt"></i></a>
        </div>
    </div>
</div>
