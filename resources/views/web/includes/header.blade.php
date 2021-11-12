<header id="header" class="header has-sticky sticky-jump">
    <div class="header-wrapper">
        <div id="top-bar" class="header-top hide-for-sticky nav-dark">
            <div class="flex-row container">
                <div class="flex-col hide-for-medium flex-left">
                    <ul class="nav nav-left medium-nav-center nav-small  nav-divided">
                        <li class="html custom html_topbar_left"><strong class="nz-topbar nz-topbar-1">
                                <p style="text-align: center;">
                                    <span style="font-size: 110%;">
                                        <i class="fas fa-phone-alt"></i>
                                        <a
                                            href="tel:{{ \App\Helper\Seo::getSetting('phone') }}">{{ \App\Helper\Seo::getSetting('phone') }}</a>
                                    </span></em>
                                </p>
                            </strong>
                        </li>
                    </ul>
                </div>
                <div class="flex-col hide-for-medium flex-center">
                    <ul class="nav nav-center nav-small  nav-divided">
                    </ul>
                </div>
                <div class="flex-col hide-for-medium flex-right">
                    <ul class="nav top-bar-nav nav-right nav-small  nav-divided">
                        <li id="menu-item-169"
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-169 menu-item-design-default">
                            <a href="{{ route('pay_info.index') }}" class="nav-top-link">Thanh toán &#8211; Chuyển
                                khoản</a>
                        </li>
                        <li id="menu-item-8725"
                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-8725 menu-item-design-default">
                            <a href="{{ route('guide.index') }}" class="nav-top-link">Hướng dẫn sử dụng</a>
                        </li>
                        <li id="menu-item-155"
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-155 menu-item-design-default">
                            <a href="{{ route('support.index') }}" class="nav-top-link">Thông tin liên hệ</a>
                        </li>
                    </ul>
                </div>
                <div class="flex-col show-for-medium flex-grow">
                    <ul class="nav nav-center nav-small mobile-nav  nav-divided">
                        <li class="html custom html_topbar_left"><strong class="nz-topbar nz-topbar-1">
                                <p style="text-align: center;">
                                    <span style="font-size: 110%;">
                                        <i class="fas fa-phone-alt"></i>
                                        <a
                                            href="tel:{{ \App\Helper\Seo::getSetting('phone') }}">{{ \App\Helper\Seo::getSetting('phone') }}</a>
                                    </span></em>
                                </p>
                            </strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="masthead" class="header-main ">
            <div class="header-inner flex-row container logo-left medium-logo-center" role="navigation">
                <!-- Logo -->
                <div id="logo" class="flex-col logo">
                    <!-- Header logo -->
                    <a href="{{ route('top') }}"
                        title="Dịch vụ Marketing và Quảng cáo - Hỗ trợ và cung cấp các dịch vụ liên quan đến mạng xã hội Fb &#8211; Gg"
                        rel="home">
                        <img width="65" height="60"
                            src="{{ \App\Helper\Common::getImage(\App\Helper\Seo::getSetting('logo'), 'thumb', 'setting') }}"
                            class="header_logo header-logo" alt="Dịch vụ Marketing và Quảng cáo" /><img width="65"
                            height="60"
                            src="{{ \App\Helper\Common::getImage(\App\Helper\Seo::getSetting('logo'), 'thumb', 'setting') }}"
                            class="header-logo-dark" alt="Dịch vụ Marketing và Quảng cáo" /></a>
                </div>
                <!-- Mobile Left Elements -->
                <div class="flex-col show-for-medium flex-left">
                    <ul class="mobile-nav nav nav-left ">
                        <li class="nav-icon has-icon">
                            <div class="header-button"> <a href="{{ route('top') }}#" data-open="#main-menu"
                                    data-pos="left" data-bg="main-menu-overlay" data-color=""
                                    class="icon primary button round is-small" aria-label="Menu"
                                    aria-controls="main-menu" aria-expanded="false">
                                    <i class="icon-menu"></i>
                                </a>
                            </div>
                        </li>
                        <li class="html header-button-1">
                            <div class="header-button">
                                <a href="{{ route('register') }}" class="button primary" style="border-radius:99px;">
                                    <span>Đăng ký</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Left Elements -->
                <div class="flex-col hide-for-medium flex-left flex-grow">
                    <ul class="header-nav header-nav-main nav nav-left  nav-box nav-size-large nav-spacing-large">
                        <li id="menu-item-180"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-52 current_page_item menu-item-180 active menu-item-design-default has-icon-left">
                            <a href="{{ route('top') }}" aria-current="page" class="nav-top-link"><img
                                    class="ux-menu-icon" width="20" height="20"
                                    src="{{ asset('assets/wp-content/uploads/2021/04/trangchu.svg') }}"
                                    alt="" />Trang
                                chủ</a>
                        </li>
                        @if (Auth::check())
                            <li id="menu-item-183"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-183 menu-item-design-default has-icon-left">
                                <a href="{{ route('account.transact') }}" class="nav-top-link"><img
                                        class="ux-menu-icon" width="20" height="20"
                                        src="{{ asset('assets/wp-content/uploads/2021/04/lsgiaodich.svg') }}"
                                        alt="" />Lịch sử nạp / tiêu dùng</a>
                            </li>
                            <li id="menu-item-182"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-182 menu-item-design-default has-icon-left">
                                <a href="{{ route('account.wallet.add') }}" class="nav-top-link"><img
                                        class="ux-menu-icon" width="20" height="20"
                                        src="{{ asset('assets/wp-content/uploads/2021/04/naptien.svg') }}"
                                        alt="" />Nạp
                                    tiền</a>
                            </li>
                            <li class="right"><a class="woo-wallet-menu-contents"
                                    href="{{ route('account.wallet') }}" title="Số dư hiện tại"><span dir="rtl"
                                        class="woo-wallet-icon-wallet"></span>&nbsp;<span
                                        class="woocommerce-Price-amount amount"><bdi>
                                            @if (Auth::check())
                                                {{ \App\Helper\Common::formatMoney(Auth::user()->balance) }}
                                            @endif
                                            &nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span>
                                        </bdi></span></a>
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- Right Elements -->
                <div class="flex-col hide-for-medium flex-right">
                    <ul class="header-nav header-nav-main nav nav-right  nav-box nav-size-large nav-spacing-large">
                        @if (Auth::check())
                            <li class="account-item has-icon has-dropdown">
                                <div class="header-button">
                                    <a href="#" class="account-link account-login icon primary button circle is-small"
                                        title="Tài khoản">
                                        <span class="header-account-title">
                                            @if (Auth::check())
                                                {{ Auth::user()->name }}
                                            @endif
                                        </span>
                                        <i class="icon-user"></i>
                                    </a>
                                </div>
                                <ul class="nav-dropdown  nav-dropdown-simple">
                                    <li id="menu-item-146"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-146 has-icon-left">
                                        <a href="{{ route('account.wallet.add') }}"><img class="ux-sidebar-menu-icon"
                                                width="20" height="20"
                                                src="{{ asset('assets/wp-content/uploads/2021/04/naptien.svg') }}"
                                                alt="" />Nạp tiền</a>
                                    </li>
                                    <li id="menu-item-145"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-145 has-icon-left">
                                        <a href="{{ route('account.transact') }}"><img class="ux-sidebar-menu-icon"
                                                width="20" height="20"
                                                src="{{ asset('assets/wp-content/uploads/2021/04/lsgiaodich.svg') }}"
                                                alt="" />Lịch sử giao
                                            dịch</a>
                                    </li>
                                    <li class="right"><a class="woo-wallet-menu-contents"
                                            href="{{ route('account.wallet') }}" title="Số dư hiện tại"><span
                                                dir="rtl" class="woo-wallet-icon-wallet"></span>&nbsp;<span
                                                class="woocommerce-Price-amount amount"><bdi>
                                                    @if (Auth::check())
                                                        {{ \App\Helper\Common::formatMoney(Auth::user()->balance) }}
                                                    @endif
                                                    &nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span>
                                                </bdi></span></a>
                                    </li>
                                    {{-- <li
                                        class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard is-active active">
                                        <a href="#">Trang tài khoản</a>
                                        <!-- empty -->
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
                                    <li
                                        class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--customer-logout">
                                        <a href="{{ route('account.customer.logout') }}">Thoát</a>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <div class="flex-col hide-for-medium flex-right">
                                <ul
                                    class="header-nav header-nav-main nav nav-right  nav-box nav-size-large nav-spacing-large">
                                    <li class="account-item has-icon">
                                        <div class="header-button">
                                            <a href="{{ route('login') }}"
                                                class="nav-top-link nav-top-not-logged-in icon primary button circle is-small">
                                                <span>Đăng nhập / Đăng ký</span>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    </ul>
                </div>
                <!-- Mobile Right Elements -->
                <div class="flex-col show-for-medium flex-right">
                    <ul class="mobile-nav nav nav-right ">
                        <li class="account-item has-icon">
                            <div class="header-button"> <a href="#"
                                    class="account-link-mobile icon primary button circle is-small" title="Tài khoản">
                                    <i class="icon-user"></i> </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-bg-container fill">
            <div class="header-bg-image fill"></div>
            <div class="header-bg-color fill"></div>
        </div>
    </div>
</header>
