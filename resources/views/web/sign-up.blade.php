@extends('web.layouts.template')
@section('content')
    <main id="main" class="">
        <div id="content" class="content-area page-wrapper" role="main">
            <div class="row row-main">
                <div class="large-12 col">
                    <div class="col-inner">
                        <script language="javascript">
                            window.onload = function() {
                                var d = new Date();
                                var y = d.getTime();
                                document.getElementById("user_email").value = 'khachhang' + y + '@gmail.com';
                            };
                        </script>
                        <div class="row align-center" id="row-517834366">
                            <div id="col-1006130095" class="col medium-6 small-12 large-6">
                                <div class="col-inner">
                                    <h2 class="lead" style="text-align: center;">Đăng ký tài khoản</h2>
                                    <p style="text-align: center;">Bạn cần ghi nhớ email để đăng nhập</br>KHÔNG chia sẻ
                                        mật khẩu với ai khác </p>
                                    <div class='user-registration ur-frontend-form ur-frontend-form--rounded '
                                        id='user-registration-form-24'>
                                        <form action="{{ route('postRegister') }}" method='post' class='register'
                                            data-form-id="24" data-enable-strength-password=""
                                            data-minimum-password-strength="3">
                                            @csrf
                                            <div class='ur-form-row'>
                                                <div class="ur-form-grid ur-grid-1" style="width:99%">
                                                    <div data-field-id="user_login" class="ur-field-item field-user_login ">
                                                        <div class="form-row validate-required" id="user_login_field"
                                                            data-priority=""><label for="user_login"
                                                                class="ur-label">Email <abbr class="required"
                                                                    title="required">*</abbr></label><input data-rules=""
                                                                data-id="user_login" type="text"
                                                                class="input-text input-text ur-frontend-field  "
                                                                name="email" id="user_login"
                                                                placeholder="Email" value=""
                                                                required="required" data-label="Username"
                                                                data-username-character="yes" /></div>
                                                    </div>
                                                    <div data-field-id="user_login" class="ur-field-item field-user_login ">
                                                        <div class="form-row validate-required" id="user_login_field"
                                                            data-priority=""><label for="user_login"
                                                                class="ur-label">Username <abbr class="required"
                                                                    title="required">*</abbr></label><input data-rules=""
                                                                data-id="user_login" type="text"
                                                                class="input-text input-text ur-frontend-field  "
                                                                name="username" id="user_login"
                                                                placeholder="Username - Tên tài khoản" value=""
                                                                required="required" data-label="Username"
                                                                data-username-character="yes" /></div>
                                                    </div>
                                                    <div data-field-id="user_pass" class="ur-field-item field-user_pass ">
                                                        <div class="form-row validate-required hide_show_password"
                                                            id="user_pass_field" data-priority=""><label for="user_pass"
                                                                class="ur-label">Mật khẩu <abbr class="required"
                                                                    title="required">*</abbr></label><span
                                                                class="password-input-group"><input data-rules=""
                                                                    data-id="user_pass" type="password"
                                                                    class="input-text input-password ur-frontend-field  "
                                                                    name="password" id="user_pass"
                                                                    placeholder="Điền mật khẩu" value="" required="required"
                                                                    data-label="Mật khẩu" /></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="ur-recaptcha-node" style="width:100px;max-width: 100px;">
                                                <div id="node_recaptcha_register" class="g-recaptcha"></div>
                                            </div>
                                            <div class="ur-button-container ">
                                                <button type="submit" class="btn button ur-submit-button ">
                                                    <span></span>
                                                    Đăng ký </button>
                                            </div>
                                            <div style="clear:both"></div>
                                            <input type="hidden" name="ur-user-form-id" value="24" />
                                            <input type="hidden" name="ur-redirect-url"
                                                value="https://dichvuquangcao.info/" />
                                            <input type="hidden" id="ur_frontend_form_nonce" name="ur_frontend_form_nonce"
                                                value="d9d6330896" />
                                        </form>
                                        <div style="clear:both"></div>
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
