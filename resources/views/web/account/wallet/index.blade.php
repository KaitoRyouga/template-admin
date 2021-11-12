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
                                <div class="woo-wallet-my-wallet-container">
                                    <div class="woo-wallet-sidebar">
                                        <h3 class="woo-wallet-sidebar-heading"><a href="index.html">My Wallet</a></h3>
                                        <ul>
                                            <li class="card"><a href="{{ route('account.wallet.add') }}"><span
                                                        class="dashicons dashicons-plus-alt"></span>
                                                    <p>Nạp tiền</p>
                                                </a></li>
                                            <li class="card"><a href="{{ route('account.transact') }}"><span
                                                        class="dashicons dashicons-list-view"></span>
                                                    <p>Giao dịch</p>
                                                </a></li>
                                        </ul>
                                    </div>
                                    <div class="woo-wallet-content">
                                        <div class="woo-wallet-content-heading">
                                            <h3 class="woo-wallet-content-h3">Số dư</h3>
                                            <p class="woo-wallet-price"><span class="woocommerce-Price-amount amount"><bdi>
                                                        @if (Auth::check())
                                                            {{ \App\Helper\Common::formatMoney(Auth::user()->balance) }}
                                                        @endif
                                                        &nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span>
                                                    </bdi></span>
                                            </p>
                                        </div>
                                        <div style="clear: both"></div>
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
