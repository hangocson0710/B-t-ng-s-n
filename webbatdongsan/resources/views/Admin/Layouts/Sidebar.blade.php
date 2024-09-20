<div class="left-side-bar">
    <div class="brand-logo">
        <a href="/">
            <img src="{{asset($about->about_logo)}}" alt="" class="light-logo">
            {{-- <img src="vendors/images/deskapp-logo-white.svg" alt="" class="light-logo"> --}}
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li class="dropdown">
                    <a href="{{route('admin.analytics.list')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-analytics-21"></span><span class="mtext">Thống kê</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="{{route('admin.system.config')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-settings2"></span><span class="mtext">Cấu hình chung</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-edit2"></span><span class="mtext">Quản lý dự án</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('admin.project.list')}}">Danh sách dự án</a></li>
                        <li><a href="{{route('admin.project.request')}}">Chờ duyệt</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:{};" class="dropdown-toggle">
                        <span class="micon dw dw-book-1"></span><span class="mtext"> Quản lý bài viết </span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('admin.classified.list')}}">Danh sách bài viết</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-money-2"></span><span class="mtext">Quản lý nạp coin</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('admin.coin.request')}}">Danh sách chờ duyệt</a></li>
                        <li><a href="{{route('admin.coin.history')}}">Lịch sử giao dịch</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-user-12"></span><span class="mtext"> Quản lý nhân viên</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('admin.staff.list')}}">Danh sách nhân viên</a></li>
                        <li><a href="{{route('admin.staff.group')}}">Nhóm quản trị</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-user1"></span><span class="mtext"> Quản lý người dùng</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('admin.user.list_user')}}">Tài khoản cá nhân</a></li>
                        <li><a href="{{route('admin.user.list_business')}}">Tài khoản doanh nghiệp</a></li>
                        <li><a href="{{route('admin.user.request')}}">Danh sách duyệt</a></li>
                        <!-- <li><a href="{{route('admin.forbidden.list')}}">Danh sách chặn cấm</a></li> -->
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:{};" class="dropdown-toggle">
                        <span class="micon dw dw-newspaper"></span><span class="mtext"> Quản lý tin tức</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('admin.focus.list')}}">Danh sách tin tức</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:{};" class="dropdown-toggle">
                        <span class="micon dw dw-slideshow"></span><span class="mtext"> Quản lý banner</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('admin.banner.list')}}">Danh sách banner</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:{};" class="dropdown-toggle">
                        <span class="micon dw dw-ban"></span><span class="mtext">Quản lý liên hệ</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.contacts.index') }}">Danh sách liên hệ</a></li>
                    </ul>
                </li>
                
            </ul>
        </div>
    </div>
</div>
