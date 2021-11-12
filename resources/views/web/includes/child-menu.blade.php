<div id="main-menu" class="mobile-sidebar no-scrollbar mfp-hide">
    <div class="sidebar-menu no-scrollbar ">
        <ul class="nav nav-sidebar nav-vertical nav-uppercase">
            <li
                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-52 current_page_item menu-item-180 has-icon-left">
                <a href="{{ route('top') }}" aria-current="page"><img class="ux-sidebar-menu-icon" width="20"
                        height="20" src="{{ asset('assets/wp-content/uploads/2021/04/trangchu.svg') }}" alt="" />Trang
                    chủ</a>
            </li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-183 has-icon-left"><a
                    href="{{ route('account.transact') }}"><img class="ux-sidebar-menu-icon" width="20" height="20"
                        src="{{ asset('assets/wp-content/uploads/2021/04/lsgiaodich.svg') }}" alt="" />Lịch sử
                    nạp / tiêu dùng</a></li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-182 has-icon-left"><a
                    href="{{ route('account.wallet.add') }}"><img class="ux-sidebar-menu-icon" width="20" height="20"
                        src="{{ asset('assets/wp-content/uploads/2021/04/naptien.svg') }}" alt="" />Nạp tiền</a></li>
            <li class="account-item has-icon menu-item">
                <a href="#" class="account-link account-login" title="Tài khoản">
                    <span class="header-account-title">
                        Tài khoản </span>
                </a>
                <ul class="children">
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-146 has-icon-left">
                        <a href="{{ route('account.wallet.add') }}"><img class="ux-sidebar-menu-icon" width="20"
                                height="20" src="{{ asset('assets/wp-content/uploads/2021/04/naptien.svg') }}"
                                alt="" />Nạp
                            tiền</a>
                    </li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-145 has-icon-left">
                        <a href="{{ route('account.transact') }}"><img class="ux-sidebar-menu-icon" width="20"
                                height="20" src="{{ asset('assets/wp-content/uploads/2021/04/lsgiaodich.svg') }}"
                                alt="" />Lịch sử giao dịch</a>
                    </li>
                    <li class="right"><a class="woo-wallet-menu-contents"
                            href="{{ route('account.wallet.add') }}" title="Số dư hiện tại"><span dir="rtl"
                                class="woo-wallet-icon-wallet"></span>&nbsp;<span
                                class="woocommerce-Price-amount amount"><bdi>0&nbsp;<span
                                        class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span></a>
                    </li>
                    {{-- <li
                        class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard is-active active">
                        <a href="#">Trang tài khoản</a>
                        <!-- empty -->
                    </li> --}}
                    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
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
                        class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
                        <a href="{{ route('account.edit.account') }}">Chi tiết tài khoản</a>
                    </li>
                </ul>
            </li>
            <li class="header-search-form search-form html relative has-icon">
                <div class="header-search-form-wrapper">
                    <div class="searchform-wrapper ux-search-box relative form-flat is-normal">
                        <form role="search" method="get" class="searchform" action="index.html">
                            <div class="flex-row relative">
                                <div class="flex-col flex-grow">
                                    <label class="screen-reader-text" for="woocommerce-product-search-field-0">Tìm
                                        kiếm:</label>
                                    <input type="search" id="woocommerce-product-search-field-0"
                                        class="search-field mb-0" placeholder="Tìm kiếm&hellip;" value="" name="s" />
                                    <input type="hidden" name="post_type" value="product" />
                                </div>
                                <div class="flex-col">
                                    <button type="submit" value="Tìm kiếm"
                                        class="ux-search-submit submit-button secondary button icon mb-0"
                                        aria-label="Submit">
                                        <i class="icon-search"></i> </button>
                                </div>
                            </div>
                            <div class="live-search-results text-left z-top"></div>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
