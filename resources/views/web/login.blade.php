@extends('web.layouts.template')
@section('content')
    <main id="main" class="">
        <div id="content" class="content-area page-wrapper" role="main">
            <div class="row row-main">
                <div class="large-12 col">
                    <div class="col-inner">
                        <div class="woocommerce">
                            <div class="woocommerce-notices-wrapper"></div>
                            <div class="account-container lightbox-inner">
                                <div class="col2-set row row-divided row-large" id="customer_login">
                                    <div class="col-1 large-6 col pb-0">
                                        <div class="account-login-inner">
                                            <h3 class="uppercase">Đăng nhập</h3>
                                            <form class="woocommerce-form woocommerce-form-login login" action="{{ route('postLogin') }}" method="post">
                                                @csrf
                                                <p
                                                    class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                    <label for="username">Địa chỉ email&nbsp;<span
                                                            class="required">*</span></label>
                                                    <input type="text"
                                                        class="woocommerce-Input woocommerce-Input--text input-text"
                                                        name="email" id="username" autocomplete="username" value="" />
                                                </p>
                                                <p
                                                    class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                    <label for="password">Mật khẩu&nbsp;<span
                                                            class="required">*</span></label>
                                                    <input class="woocommerce-Input woocommerce-Input--text input-text"
                                                        type="password" name="password" id="password"
                                                        autocomplete="current-password" />
                                                </p>
                                                <p class="form-row">
                                                    <input type="hidden" id="woocommerce-login-nonce"
                                                        name="woocommerce-login-nonce" value="ddaa55c424" /><input
                                                        type="hidden" name="_wp_http_referer" value="/tai-khoan/" /> <button
                                                        type="submit"
                                                        class="woocommerce-button button woocommerce-form-login__submit"
                                                        name="login" value="Đăng nhập">Đăng nhập</button>
                                                </p>
                                                <p class="woocommerce-LostPassword lost_password">
                                                    <a href="{{ route('account.lost.password') }}">Quên mật khẩu?</a>
                                                </p>
                                                <a data-animate="bounceInLeft"
                                                    href="{{ route('register') }}"
                                                    target="_self"
                                                    class="button secondary is-gloss box-shadow-2 box-shadow-5-hover"
                                                    style="border-radius:5px;">
                                                    <span>Đăng ký</span>
                                                    <i class="icon-user-o"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-2 large-6 col pb-0">
                                        <div class="account-register-inner">
                                            <h3 class="uppercase">Đăng ký</h3>
                                            <form method="post" class="woocommerce-form woocommerce-form-register register">
                                                <p
                                                    class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                    <label for="reg_username">Tên tài khoản&nbsp;<span
                                                            class="required">*</span></label>
                                                    <input type="text"
                                                        class="woocommerce-Input woocommerce-Input--text input-text"
                                                        name="username" id="reg_username" autocomplete="username"
                                                        value="" />
                                                </p>
                                                <p
                                                    class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                    <label for="reg_email">Địa chỉ email&nbsp;<span
                                                            class="required">*</span></label>
                                                    <input type="email"
                                                        class="woocommerce-Input woocommerce-Input--text input-text"
                                                        name="email" id="reg_email" autocomplete="email" value="" />
                                                </p>
                                                <p
                                                    class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                    <label for="reg_password">Mật khẩu&nbsp;<span
                                                            class="required">*</span></label>
                                                    <input type="password"
                                                        class="woocommerce-Input woocommerce-Input--text input-text"
                                                        name="password" id="reg_password" autocomplete="new-password" />
                                                </p>
                                                <div class="woocommerce-privacy-policy-text">
                                                    <p>
                                                    <p><b><span style="text-decoration: underline;">THÔNG TIN CHUYỂN
                                                                KHOẢN</span><b></b></b></p>
                                                    <p><strong>BIDV</strong> - BÙI DUY LINH - Chi nhánh BIDV HCM<br />
                                                        Số tài khoản: <span style="color: #ff0000;">14110000293214</span>
                                                    </p>
                                                    <p><strong>TECHCOMBANK</strong> - BÙI DUY LINH - Chi nhánh HCM<br />
                                                        Số tài khoản: <span style="color: #ff0000;">19032663271016</span>
                                                    </p>
                                                    <p><strong>MOMO</strong> - BÙI DUY LINH - (hoặc tên trong danh bạ)<br />
                                                        Số điện thoại: <span style="color: #ff0000;">0945650670</span></p>
                                                    <p>Nội dung chuyển tiền ghi <em><strong>Username</strong></em> (tên tài
                                                        khoản)</p>
                                                    </p>
                                                </div>
                                                <p class="woocommerce-form-row form-row">
                                                    <input type="hidden" id="woocommerce-register-nonce"
                                                        name="woocommerce-register-nonce" value="ae9659f57e" /><input
                                                        type="hidden" name="_wp_http_referer" value="/tai-khoan/" /> <button
                                                        type="submit"
                                                        class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit"
                                                        name="register" value="Đăng ký">Đăng ký</button>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
