@extends('web.layouts.template')
@section('content')
    <main id="main" class="">
        <div id="content" class="content-area page-wrapper" role="main">
            <div class="row row-main">
                <div class="large-12 col">
                    <div class="col-inner">
                        <div class="woocommerce">
                            <div class="woocommerce-notices-wrapper"></div>
                            <form method="post" class="woocommerce-ResetPassword lost_reset_password">
                                <p>Quên mật khẩu? Vui lòng nhập tên đăng nhập hoặc địa chỉ email. Bạn sẽ nhận được một liên
                                    kết tạo mật khẩu mới qua email.</p>
                                <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                                    <label for="user_login">Tên đăng nhập hoặc email</label>
                                    <input class="woocommerce-Input woocommerce-Input--text input-text" type="text"
                                        name="user_login" id="user_login" autocomplete="username" />
                                </p>
                                <div class="clear"></div>
                                <p class="woocommerce-form-row form-row">
                                    <input type="hidden" name="wc_reset_password" value="true" />
                                    <button type="submit" class="woocommerce-Button button" value="Đặt lại mật khẩu">Đặt lại
                                        mật khẩu</button>
                                </p>
                                <input type="hidden" id="woocommerce-lost-password-nonce"
                                    name="woocommerce-lost-password-nonce" value="f6ddb58fdd" /><input type="hidden"
                                    name="_wp_http_referer" value="/tai-khoan/lost-password/" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
