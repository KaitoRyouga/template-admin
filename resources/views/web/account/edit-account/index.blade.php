@extends('web.layouts.template')
@section('content')
    <main id="main" class="">
        <div id="content" class="content-area page-wrapper" role="main">
            <div class="row row-main">
                <div class="large-12 col">
                    <div class="col-inner">
                        <div class="woocommerce">
                            <div class="woocommerce-MyAccount-content">
                                <div class="woocommerce-notices-wrapper"></div>
                                <form class="woocommerce-EditAccountForm edit-account" action="{{ route('client.changeInfo') }}" method="post">
                                    @csrf
                                    <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                                        <label for="account_first_name">Tên&nbsp;<span
                                                class="required">*</span></label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text"
                                            name="firstName" id="account_first_name" autocomplete="given-name"
                                            value="{{ Auth::user()->firstName }}" />
                                    </p>
                                    <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                                        <label for="account_last_name">Họ&nbsp;<span class="required">*</span></label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text"
                                            name="lastName" id="account_last_name" autocomplete="family-name"
                                            value="{{ Auth::user()->lastName }}" />
                                    </p>
                                    <div class="clear"></div>
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="account_display_name">Tên hiển thị&nbsp;<span
                                                class="required">*</span></label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text"
                                            name="username" id="account_display_name"
                                            value="{{ Auth::user()->name }}" />
                                    </p>
                                    <div class="clear"></div>
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="account_email">Địa chỉ email&nbsp;<span
                                                class="required">*</span></label>
                                        <input type="email" class="woocommerce-Input woocommerce-Input--email input-text"
                                            name="email" id="account_email" autocomplete="email"
                                            value="{{ Auth::user()->email }}" />
                                    </p>
                                    <fieldset>
                                        <legend>Thay đổi mật khẩu</legend>
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="password_current">Mật khẩu hiện tại (bỏ trống nếu không đổi)</label>
                                            <input type="password"
                                                class="woocommerce-Input woocommerce-Input--password input-text"
                                                name="oldpassword" id="password_current" autocomplete="off" />
                                        </p>
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="password_1">Mật khẩu mới (bỏ trống nếu không đổi)</label>
                                            <input type="password"
                                                class="woocommerce-Input woocommerce-Input--password input-text"
                                                name="password" id="password_1" autocomplete="off" />
                                        </p>
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="password_2">Xác nhận mật khẩu mới</label>
                                            <input type="password"
                                                class="woocommerce-Input woocommerce-Input--password input-text"
                                                name="repassword" id="password_2" autocomplete="off" />
                                        </p>
                                    </fieldset>
                                    <div class="clear"></div>
                                    <p>
                                        <input type="hidden" id="save-account-details-nonce"
                                            name="save-account-details-nonce" value="30dde85cef" /><input type="hidden"
                                            name="_wp_http_referer" value="/tai-khoan/edit-account/" /> <button
                                            type="submit" class="woocommerce-Button button" name="save_account_details"
                                            value="Lưu thay đổi">Lưu thay đổi</button>
                                        <input type="hidden" name="action" value="save_account_details" />
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
