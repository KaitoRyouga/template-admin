<div class="col">
    <div class="col-inner">
        <div class="badge-container absolute left top z-1">
            <div class="callout badge badge-square">
                @if (!empty($value->discount))
                    <div class="badge-inner secondary on-sale">
                        <span class="onsale">Giảm giá!</span>
                    </div>
                @endif
            </div>
        </div>
        <div class="product-small box has-hover box-normal box-text-bottom">
            <div class="box-image">
                <div class="image-glow">
                    <a href="">
                        <img width="1605" height="813"
                            src="data:image/svg+xml,%3Csvg%20viewBox%3D%220%200%201605%20813%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3C%2Fsvg%3E"
                            data-src="{{ \App\Helper\Common::getImage(isset($value->parent_product_id) ? $value->parent->image : $value->image, 'thumb', isset($value->parent_product_id) ? 'parent_product' : 'product') }}"
                            class="lazy-load attachment-original size-original" alt="" loading="lazy" srcset="" />
                    </a>
                </div>
                <div class="image-tools top right show-on-hover"></div>
                <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                </div>
            </div>
            <div class="box-text text-center">
                <div class="title-wrapper">
                    <p class="name product-title woocommerce-loop-product__title">
                        <a href="" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                            {{ $value->name }}
                        </a>
                    </p>
                    <span class="on-woo-wallet-cashback" style="display:none;"></span>
                </div>
                <div class="price-wrapper">
                    <span class="price">
                        <del aria-hidden="true" style="text-decoration: none;">
                            <span class="woocommerce-Price-amount amount">
                                <bdi>{{ \App\Helper\Common::formatMoney($value->price) }}&nbsp; <span
                                        class="woocommerce-Price-currencySymbol">&#8363;</span>
                                </bdi>
                            </span>
                        </del>
                        @if (!empty($value->discount))
                            <ins>
                                <span class="woocommerce-Price-amount amount">
                                    <bdi>{{ \App\Helper\Common::formatMoney($value->price * ((100 + $value->discount) / 100)) }}&nbsp;
                                        <span class="woocommerce-Price-currencySymbol">&#8363;</span>
                                    </bdi>
                                </span>
                            </ins>
                        @endif
                    </span>
                    <div class="giaspsl" style="margin-bottom:20px;display:none">Tổng giá:
                        <span class="price classid627">149</span>
                    </div>
                    <script>
                        jQuery(function($) {
                            var price = 200,
                                current_cart_total = 6000,
                                currency = '&#8363;';
                            $('form[action="?add-to-cart=627"] [name=quantity]').change(function() {
                                if (!(this.value < 1)) {
                                    var product_total = parseFloat(price * this.value);

                                    function chuyendangtien(x) {
                                        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                    }
                                    var tientp = chuyendangtien(product_total);
                                    var classid = 627;
                                    $('.giaspsl .price.classid627').html(tientp + ' đ');
                                }
                                $('.giaspsl').toggle(!(this.value <= 1));
                            });
                        });
                    </script>
                </div>
                <form action="{{ route('client.cart') }}" class="cart" method="get">
                    <div class="quantity buttons_added">
                        <input type="button" value="-" class="minus button is-form">
                        <label class="screen-reader-text" for="quantity_618d320a6fd0f">{{ $value->name }}</label>
                        <input type="number" id="quantity_618d320a6fd0f" class="input-text qty text" step="1"
                            min="{{ $value->min }}" max="{{ $value->max }}" name="quantity" value="1" title="SL"
                            size="4" placeholder="" inputmode="numeric" />
                        <input type="button" value="+" class="plus button is-form">
                        <input type="hidden" name="id" value="{{ $value->id }}">
                    </div>
                    <button type="submit" class="button alt">Đặt
                        hàng</button>
                </form>
            </div>
        </div>
    </div>
</div>
