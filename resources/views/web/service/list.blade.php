@extends('web.layouts.template')
@section('content')
    <main id="main">
        <div class="row category-page-row">
            <div class="shop-container">
                <div class="woocommerce-notices-wrapper"></div>
                <div class="products row row-small large-columns-4 medium-columns-3 small-columns-2 has-equal-box-heights equalize-box">
                    @if (isset($data))
                        @foreach ($data as $item)
                            <div class="product-small col has-hover product type-product post-31445 status-publish first instock product_cat-tang-mat-live-stream-chat has-post-thumbnail shipping-taxable purchasable product-type-simple">
                                <div class="col-inner">
                                    <div class="badge-container absolute left top z-1"></div>
                                    <div class="product-small box">
                                        <div class="box-image">
                                            <div class="image-none">
                                                <a href="#">
                                                    <img width="250" height="125"
                                                        src="{{ \App\Helper\Common::getImage(isset($item->parent_product_id) ? $item->parent->image_url : $item->image_url, 'fullpath') }}"
                                                        data-src="{{ \App\Helper\Common::getImage(isset($item->parent_product_id) ? $item->parent->image_url : $item->image_url, 'fullpath') }}"
                                                        class="lazy-load attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                        alt="" loading="lazy" srcset=""
                                                        data-srcset="{{ \App\Helper\Common::getImage(isset($item->parent_product_id) ? $item->parent->image_url : $item->image_url, 'fullpath') }} 250w, https://dichvuquangcao.info/wp-content/uploads/2021/04/icon-website-04-658x330.png 658w, https://dichvuquangcao.info/wp-content/uploads/2021/04/icon-website-04-330x165.png 330w, https://dichvuquangcao.info/wp-content/uploads/2021/04/icon-website-04-768x385.png 768w, {{ \App\Helper\Common::getImage(isset($item->parent_product_id) ? $item->parent->image_url : $item->image_url, 'fullpath') }} 834w"
                                                        sizes="(max-width: 250px) 100vw, 250px" />
                                                </a>
                                            </div>
                                            <div class="image-tools is-small top right show-on-hover"></div>
                                            <div class="image-tools is-small hide-for-small bottom left show-on-hover"></div>
                                            <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover"></div>
                                        </div>
                                        <div class="box-text box-text-products text-center grid-style-2">
                                            <div class="title-wrapper">
                                                <p class="name product-title woocommerce-loop-product__title">
                                                    <a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">{{ $item->name }}</a>
                                                </p>
                                                <span class="on-woo-wallet-cashback" style="display:none;"></span>
                                            </div>
                                            <div class="price-wrapper">
                                                <span class="price">
                                                    <span class="woocommerce-Price-amount amount"><bdi>{{ \App\Helper\Common::formatMoney($item->price * ((100 - $item->discount) / 100)) }}&nbsp;
                                                        <span class="woocommerce-Price-currencySymbol">&#8363;</span></bdi>
                                                    </span>
                                                </span>
                                                <div class="giaspsl" style="margin-bottom:20px;display:none">Tổng giá:
                                                    <script>
                                                        jQuery(function($) {
                                                            var price = 590,
                                                                current_cart_total = 0,
                                                                currency = '&#8363;';
                                                            $('form[action="?add-to-cart=31445"] [name=quantity]').change(function() {
                                                                if (!(this.value < 1)) {
                                                                    var product_total = parseFloat(price * this.value);

                                                                    function chuyendangtien(x) {
                                                                        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                                                    }
                                                                    var tientp = chuyendangtien(product_total);
                                                                    var classid = 31445;
                                                                    $('.giaspsl .price.classid31445').html(tientp + ' đ');
                                                                }
                                                                $('.giaspsl').toggle(!(this.value <= 1));
                                                            });
                                                        });
                                                    </script>
                                                </div>
                                                <form action="{{ route('client.cart') }}" class="cart" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="quantity buttons_added">
                                                        <input type="button" value="-" class="minus button is-form">
                                                        <label class="screen-reader-text" for="quantity_616ee5971a214">{{ $item->name }}</label>
                                                        <input type="number" id="quantity_616ee5971a214" 
                                                            class="input-text qty text" step="1" min="{{ $item->min }}"
                                                            max="{{ $item->max }}" name="quantity" value="30" title="SL"
                                                            size="4" placeholder="" inputmode="numeric" />
                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                        <input type="button" value="+" class="plus button is-form">
                                                    </div>
                                                    <button type="submit" class="button alt">Đặt hàng</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
