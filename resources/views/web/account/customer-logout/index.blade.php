@extends('web.layouts.template')
@section('content')
    <main id="main" class="">
        <div id="content" class="content-area page-wrapper" role="main">
            <div class="row row-main">
                <div class="large-12 col">
                    <div class="col-inner">
                        <div class="woocommerce">
                            <div class="woocommerce-MyAccount-content">
                                <div class="woocommerce-notices-wrapper">
                                    <div class="woocommerce-message message-wrapper" role="alert">
                                        <div class="message-container container success-color medium-text-center">
                                            <i class="icon-checkmark"></i> Bạn có chắc chắn muốn đăng xuất không? <a
                                                href="{{ route('logout') }}">Xác nhận và đăng xuất</a>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    Xin chào <strong>
                                        @if (Auth::check())
                                            {{ Auth::user()->name }}
                                        @endif
                                    </strong> (không phải tài khoản <strong>
                                        @if (Auth::check())
                                            {{ Auth::user()->name }}
                                        @endif
                                    </strong>?
                                    Hãy <a href="{{ route('logout') }}">thoát ra</a> và đăng nhập vào tài
                                    khoản của bạn)</p>
                                <p>
                                    Từ trang quản lý tài khoản bạn có thể xem <a href="../orders/index.html">đơn hàng
                                        mới</a>, quản lý <a href="{{ route('account.edit.address') }}">địa chỉ giao hàng
                                        và thanh
                                        toán</a>, and <a href="{{ route('account.edit.account') }}">sửa mật khẩu và thông
                                        tin tài
                                        khoản</a>.</p>
                                <ul class="dashboard-links">
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-146"><a
                                            href="{{ route('account.wallet.add') }}">Nạp tiền</a></li>
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-145"><a
                                            href="{{ route('account.transact') }}">Lịch sử giao dịch</a></li>
                                    <li class="right"><a class="woo-wallet-menu-contents"
                                            href="{{ route('account.wallet') }}" title="Số dư hiện tại"><span dir="rtl"
                                                class="woo-wallet-icon-wallet"></span>&nbsp;<span
                                                class="woocommerce-Price-amount amount"><bdi>{{ \App\Helper\Common::formatMoney(Auth::user()->balance) }}&nbsp;<span
                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span></a>
                                    </li>
                                    {{-- <li
                                        class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard">
                                        <a href="#">Trang tài khoản</a>
                                    </li> --}}
                                    <li
                                        class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
                                        <a href="{{ route('account.orders') }}">Đơn hàng</a>
                                    </li>
                                    {{-- <li
                                        class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-address">
                                        <a href="{{ route('account.edit.address') }}">Các địa chỉ URL</a>
                                    </li> --}}
                                    <li
                                        class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
                                        <a href="{{ route('account.edit.account') }}">Chi tiết tài khoản</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
