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
                                <div id="wc-wallet-transaction-details_wrapper" class="dataTables_wrapper no-footer">
                                    <div class="dataTables_length" id="wc-wallet-transaction-details_length"><label>Hiển thị
                                            <select name="wc-wallet-transaction-details_length"
                                                aria-controls="wc-wallet-transaction-details" class="">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select></label></div>
                                    <div id="wc-wallet-transaction-details_filter" class="dataTables_filter"><label>Tìm theo
                                            ngày<input type="search" id="datepicker"
                                                placeholder="yyyy-mm-dd (năm-tháng-ngày)"
                                                aria-controls="wc-wallet-transaction-details" id="dp1636479151546"></label>
                                    </div>
                                    <table id="wc-wallet-transaction-details"
                                        class="table dataTable no-footer dtr-inline collapsed" role="grid"
                                        aria-describedby="wc-wallet-transaction-details_info" style="width: 1044px;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" rowspan="1" colspan="1" style="width: 92px;"
                                                    aria-label="ID">ID</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 326px;"
                                                    aria-label="Sản phẩm">Sản phẩm</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 269px;"
                                                    aria-label="Số lượng">Số lượng</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 213px;"
                                                    aria-label="Tổng tiền">Tổng tiền</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 200px;"
                                                    aria-label="Ngày thanh toán">Ghi chú</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 200px;"
                                                    aria-label="Ngày thanh toán">Ngày thanh toán</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $id = 1;
                                            @endphp


                                            @if (!empty($orders))

                                                @foreach ($orders as $item)
                                                    <tr>
                                                        <td>{{ $id++ }}</td>
                                                        <td>{{ $item->order_item[0]->product->name }}</td>
                                                        <td>{{ $item->order_item[0]->quantity }}</td>
                                                        <td>{{ \App\Helper\Common::formatMoney($item->total) }} ₫</td>
                                                        <td>{{ mb_substr($item->note, 0, 50, 'UTF-8').(strlen($item->note) > 50 ? '...' : '') }}</td>
                                                        <td>{{ $item->created_at }}</td>
                                                    </tr>
                                                @endforeach

                                            @else
                                                <tr class="odd">
                                                    <td valign="top" colspan="4" class="dataTables_empty">Chưa có giao dịch
                                                    </td>
                                                </tr>
                                            @endif

                                        </tbody>
                                    </table>
                                    <div class="dataTables_info" id="wc-wallet-transaction-details_info" role="status"
                                        aria-live="polite">Showing 0 to 0 of 0 entries</div>
                                    <div class="dataTables_paginate paging_simple_numbers"
                                        id="wc-wallet-transaction-details_paginate"><a
                                            class="paginate_button previous disabled"
                                            aria-controls="wc-wallet-transaction-details" data-dt-idx="0" tabindex="0"
                                            id="wc-wallet-transaction-details_previous">Trước</a><span></span><a
                                            class="paginate_button next disabled"
                                            aria-controls="wc-wallet-transaction-details" data-dt-idx="1" tabindex="0"
                                            id="wc-wallet-transaction-details_next">Sau</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
