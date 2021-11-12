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
                                        <h3 class="woo-wallet-sidebar-heading"><a
                                                href="{{ route('account.wallet.add') }}">My Wallet</a></h3>
                                        <ul>
                                            <li class="card"><a href="{{ route('top') }}"><span
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
                                        <hr />
                                        <form method="POST" action="{{ route('pay_info.pay') }}">
                                            @csrf
                                            <div class="woo-wallet-add-amount">
                                                <label for="money">Nhập số tiền</label>
                                                <input type="number" step="10000" min="10000"
                                                    name="money" id="money"
                                                    class="woo-wallet-balance-to-add" required />
                                               <input type="submit"
                                                    name="woo_add_to_wallet" class="woo-add-to-wallet" value="NẠP" />
                                            </div>
                                        </form>
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
