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
                                <p>
                                    Các địa chỉ bên dưới mặc định sẽ được sử dụng ở trang thanh toán sản phẩm.</p>
                                <div class="u-columns woocommerce-Addresses col2-set addresses">
                                    <div class="u-column1 col-1 woocommerce-Address">
                                        <header class="woocommerce-Address-title title">
                                            <h3>Địa chỉ thanh toán</h3>
                                            <a href="#" class="edit">Thêm</a>
                                        </header>
                                        <address>
                                            Bạn vẫn chưa thêm địa chỉ nào. </address>
                                    </div>
                                    <div class="u-column2 col-2 woocommerce-Address">
                                        <header class="woocommerce-Address-title title">
                                            <h3>Địa chỉ giao hàng</h3>
                                            <a href="#" class="edit">Thêm</a>
                                        </header>
                                        <address>
                                            Bạn vẫn chưa thêm địa chỉ nào. </address>
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
