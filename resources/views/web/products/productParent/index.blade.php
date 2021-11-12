<div class="col">
    <div class="col-inner">
        <div class="badge-container absolute left top z-1"></div>
        <div class="product-small box has-hover box-normal box-text-bottom">
            <div class="box-image">
                <div class="image-glow">
                    <a href="">
                        <img width="834" height="418"
                            src="{{ \App\Helper\Common::getImage($value->image, 'thumb', 'parent_product') }}"
                            data-src="{{ \App\Helper\Common::getImage($value->image, 'thumb', 'parent_product') }}"
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
                    <a href="#tmls{{ $value->id }}" target="_self" class="button primary">
                        <span>Đặt hàng - Chọn thời gian</span>
                    </a>
                    <div id="tmls{{ $value->id }}" class="lightbox-by-id lightbox-content mfp-hide lightbox-white "
                        style="max-width:600px ;padding:20px">
                        <p style="text-align: center;">
                            <em>Dịch vụ tăng mắt Livestream chất lượng
                                cao</em>
                        </p>
                        <p style="text-align: center;">
                            <em>Hỗ trợ hoàn tiền. Hỗ trợ lỗi. Buff dư mắt.
                                Đảm bảo
                                chất lượng</em>
                        </p>
                        <p>
                        <div class="row  equalize-box large-columns-2 medium-columns- small-columns- row-xsmall">
                            <?php $products = $value->product_child ; ?>
                            @if (count($products) > 0)
                                @foreach ($products as $product)
                                    @include('web.products.productParent.col',['value'=>$product])
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
