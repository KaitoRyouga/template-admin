@extends('web.layouts.template')
@section('content')
    <style>
        #showData tr {
            text-align: center;
        }

    </style>
    <main id="main" class="">
        <div id="content" class="content-area page-wrapper" role="main">
            <div class="row row-main">
                <div class="large-12 col">
                    <div class="col-inner">
                        <div class="woocommerce">
                            <div class="woocommerce-MyAccount-content">
                                <div class="woocommerce-notices-wrapper"></div>
                                <p>Số dư hiện tại: <span
                                        class="woocommerce-Price-amount amount"><bdi>{{ \App\Helper\Common::formatMoney(Auth::user()->balance) }}&nbsp;<span
                                                class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span> <a
                                        href="{{ route('account.wallet') }}"><span
                                            class="dashicons dashicons-editor-break"></span></a></p>
                                <table id="data-table" class="display hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>SỐ DƯ VÀO (+)</th>
                                            <th>CHI TIÊU (-)</th>
                                            <th>CHI TIẾT</th>
                                            <th>THỜI GIAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $id = 1;
                                        @endphp
                                        @if (!empty($transactions))
                                            @foreach ($transactions as $item)
                                                <tr>
                                                    <td>{{ $id++ }}</td>
                                                    <td>{{ \App\Helper\Common::formatMoney($item->input) }} ₫</td>
                                                    <td>{{ 0 }}</td>
                                                    <td>{{ mb_substr($item->details, 0, 50, 'UTF-8') . (strlen($item->details) > 50 ? '...' : '') }}
                                                    </td>
                                                    <td>{{ $item->created_at }}</td>
                                                </tr>
                                            @endforeach
                                            @if (!empty($orders))
                                                @foreach ($orders as $item)
                                                    <tr>
                                                        <td>{{ $id++ }}</td>
                                                        <td>{{ 0 }}</td>
                                                        <td>{{ \App\Helper\Common::formatMoney($item->total) }} ₫</td>
                                                        <td>{{ mb_substr($item->note, 0, 50, 'UTF-8') . (strlen($item->note) > 50 ? '...' : '') }}
                                                        </td>
                                                        <td>{{ $item->created_at }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        @else
                                            <tr class="odd">
                                                <td valign="top" colspan="4" class="dataTables_empty">Chưa có giao dịch
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
                                <script>
                                    $(document).ready(function() {
                                        $('#data-table').DataTable();
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
