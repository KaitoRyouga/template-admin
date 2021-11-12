@extends('web.layouts.template')
@section('content')
    <main id="main" class="">
        <div id="content" class="content-area page-wrapper" role="main">
            <div class="row row-main">
                <div class="large-12 col">
                    <div class="col-inner">
                        <div class="woocommerce">
                            <div class="woocommerce-notices-wrapper"></div>
                            <div class="woocommerce-notices-wrapper"></div>
                            <form name="checkout" method="post" class="checkout woocommerce-checkout "
                                action="{{ route('pay_info.postPay') }}" enctype="multipart/form-data"
                                novalidate="novalidate">
                                @csrf
                                <div class="row pt-0 ">
                                    <div class="large-7 col  ">
                                        <div id="customer_details">
                                            <div class="clear">
                                                <div class="woocommerce-billing-fields">
                                                    <h3>Thông tin thanh toán</h3>
                                                    <div class="woocommerce-billing-fields__field-wrapper">
                                                        <p class="form-row form-row-first validate-required"
                                                            id="billing_first_name_field" data-priority="10"><span
                                                                class="woocommerce-input-wrapper">
                                                                <div class="fl-wrap fl-wrap-input"><input
                                                                        type="text" class="input-text fl-input"
                                                                        name="username" id="billing_first_name"
                                                                        placeholder="Nhập Username" value="{{ Auth::user()->name }}"
                                                                        autocomplete="given-name"></div>
                                                            </span></p>
                                                        <p class="form-row form-row-wide validate-phone"
                                                            id="billing_phone_field" data-priority="100"><span
                                                                class="woocommerce-input-wrapper">
                                                                <div class="fl-wrap fl-wrap-input"><input
                                                                        type="tel" class="input-text fl-input"
                                                                        name="phone" id="billing_phone"
                                                                        placeholder="Nhập số điện thoại (có thể để trống)"
                                                                        value="" autocomplete="tel"></div>
                                                            </span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clear">
                                                <div class="woocommerce-shipping-fields">
                                                </div>
                                                <div class="woocommerce-additional-fields">
                                                    <h3>Thông tin bổ sung</h3>
                                                    <div class="woocommerce-additional-fields__field-wrapper">
                                                        <p class="form-row notes" id="order_comments_field"
                                                            data-priority=""><span class="woocommerce-input-wrapper">
                                                                <div class="fl-wrap fl-wrap-textarea"><textarea name="note"
                                                                        class="input-text fl-textarea" id="order_comments"
                                                                        placeholder="Bạn có thể Ghi chú thêm một vài thông tin khác..."
                                                                        rows="2" cols="5"></textarea></div>
                                                            </span></p>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="input" value="{{ $money }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="large-5 col">
                                        <div class="col-inner has-border">
                                            <div class="checkout-sidebar sm-touch-scroll">
                                                <h3 id="order_review_heading">Đơn hàng của bạn</h3>
                                                <div id="order_review" class="woocommerce-checkout-review-order">
                                                    <table class="shop_table woocommerce-checkout-review-order-table">
                                                        <thead>
                                                            <tr>
                                                                <th class="product-name">Sản phẩm</th>
                                                                <th class="product-total">Tạm tính</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="cart_item">
                                                                <td class="product-name">
                                                                    Nạp tiền&nbsp; <strong
                                                                        class="product-quantity">×&nbsp;1</strong> </td>
                                                                <td class="product-total">
                                                                    <span class="woocommerce-Price-amount amount"><bdi>{{ \App\Helper\Common::formatMoney($money) }}&nbsp;<span
                                                                                class="woocommerce-Price-currencySymbol">₫</span></bdi></span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr class="cart-subtotal">
                                                                <th>Tạm tính</th>
                                                                <td><span class="woocommerce-Price-amount amount"><bdi>{{ \App\Helper\Common::formatMoney($money) }}&nbsp;<span
                                                                                class="woocommerce-Price-currencySymbol">₫</span></bdi></span>
                                                                </td>
                                                            </tr>
                                                            <tr class="order-total">
                                                                <th>Tổng</th>
                                                                <td><strong><span
                                                                            class="woocommerce-Price-amount amount"><bdi>{{ \App\Helper\Common::formatMoney($money) }}&nbsp;<span
                                                                                    class="woocommerce-Price-currencySymbol">₫</span></bdi></span></strong>
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                    <div id="payment" class="woocommerce-checkout-payment">
                                                        <ul class="wc_payment_methods payment_methods methods">
                                                            <li class="wc_payment_method payment_method_bacs">
                                                                <input id="payment_method_bacs" type="radio"
                                                                    class="input-radio" name="payment_method"
                                                                    value="bacs" checked="checked" data-order_button_text=""
                                                                    style="display: none;">
                                                                <label for="payment_method_bacs">
                                                                    Chuyển khoản ngân hàng </label>
                                                                <div class="payment_box payment_method_bacs">
                                                                    <p>BIDV – BÙI DUY LINH – Chi nhánh BIDV HCM<br>
                                                                        Số tài khoản: 14110000293214</p>
                                                                    <p>TECHCOMBANK – BÙI DUY LINH – Chi nhánh Techcombank
                                                                        HCM<br>
                                                                        Số tài khoản: 19032663271016</p>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <div class="form-row place-order">
                                                            <noscript>
                                                                Trình duyệt của bạn không hỗ trợ JavaScript, hoặc nó bị vô
                                                                hiệu hóa, hãy đảm bảo bạn nhấp vào <em>Cập nhật giỏ
                                                                    hàng</em> trước khi bạn thanh toán. Bạn có thể phải trả
                                                                nhiều hơn số tiền đã nói ở trên, nếu bạn không làm như vậy.
                                                                <br /><button type="submit" class="button alt"
                                                                    name="woocommerce_checkout_update_totals"
                                                                    value="Cập nhật tổng">Cập nhật tổng</button>
                                                            </noscript>
                                                            <div class="woocommerce-terms-and-conditions-wrapper">
                                                            </div>
                                                            <button type="submit" class="button alt"
                                                                name="woocommerce_checkout_place_order" id="place_order"
                                                                value="Đặt hàng" data-value="Đặt hàng">Đặt hàng</button>
                                                            <input type="hidden" id="woocommerce-process-checkout-nonce"
                                                                name="woocommerce-process-checkout-nonce"
                                                                value="d3313fbe51"><input type="hidden"
                                                                name="_wp_http_referer"
                                                                value="/?wc-ajax=update_order_review">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="woocommerce-privacy-policy-text">
                                                    <p></p>
                                                    <p><b><span style="text-decoration: underline;">THÔNG TIN CHUYỂN
                                                                KHOẢN</span><b></b></b></p>
                                                    <p><strong>BIDV</strong> - BÙI DUY LINH - Chi nhánh BIDV HCM<br>
                                                        Số tài khoản: <span style="color: #ff0000;">14110000293214</span>
                                                    </p>
                                                    <p><strong>TECHCOMBANK</strong> - BÙI DUY LINH - Chi nhánh HCM<br>
                                                        Số tài khoản: <span style="color: #ff0000;">19032663271016</span>
                                                    </p>
                                                    <p><strong>MOMO</strong> - BÙI DUY LINH - (hoặc tên trong danh bạ)<br>
                                                        Số điện thoại: <span style="color: #ff0000;">0945650670</span></p>
                                                    <p>Nội dung chuyển tiền ghi <em><strong>Username</strong></em> (tên tài
                                                        khoản)</p>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
