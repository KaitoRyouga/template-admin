@extends('admin.layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- PAGE-HEADER -->
    <div>
        <h1 class="page-title">Dashboard</h1>
    </div>
    <!-- PAGE-HEADER END -->
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xl-6">
            <div class="card">
                <div class="card-body text-center statistics-info">
                    <div class="counter-icon bg-primary mb-0 box-primary-shadow"> <i class="fe fe-trending-up text-white"></i>
                    </div>
                    <h6 class="mt-4 mb-1">Total Revenue Transactions</h6>
                            <h2 class="mb-2 number-font">{{ \App\Helper\Common::formatMoney(\App\Models\Transactions::total()) }} VND</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xl-6">
            <div class="card">
                <div class="card-body text-center statistics-info">
                    <div class="counter-icon bg-secondary mb-0 box-secondary-shadow"> <i
                            class="fe fe-codepen text-white"></i> </div>
                    <h6 class="mt-4 mb-1">Total Revenue Order</h6>
                    <h2 class="mb-2 number-font">{{ \App\Helper\Common::formatMoney(\App\Models\Orders::total()) }} VND</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xl-6">
            <div class="card">
                <div class="card-body text-center statistics-info">
                    <div class="counter-icon bg-success mb-0 box-success-shadow"> <i
                            class="fe fe-dollar-sign text-white"></i> </div>
                    <h6 class="mt-4 mb-1">Total Users</h6>
                    <h2 class="mb-2 number-font">{{ \App\Models\User::count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xl-6">
            <div class="card">
                <div class="card-body text-center statistics-info">
                    <div class="counter-icon bg-info mb-0 box-info-shadow"> <i class="fe fe-briefcase text-white"></i>
                    </div>
                    <h6 class="mt-4 mb-1">Total Transactions</h6>
                    <h2 class="mb-2  number-font">{{ \App\Models\Transactions::count() }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xl-6">
            <div class="card">
                <div class="card-body text-center statistics-info">
                    <div class="counter-icon bg-primary mb-0 box-primary-shadow"> <i
                            class="fe fe-trending-up text-white"></i>
                    </div>
                    <h6 class="mt-4 mb-1">Total Orders</h6>
                    <h2 class="mb-2 number-font">{{ \App\Models\Orders::count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xl-6">
            <div class="card">
                <div class="card-body text-center statistics-info">
                    <div class="counter-icon bg-secondary mb-0 box-secondary-shadow"> <i
                            class="fe fe-codepen text-white"></i> </div>
                            <h6 class="mt-4 mb-1">Total Articles</h6>
                            <h2 class="mb-2 number-font">{{ \App\Models\Articles::count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xl-6">
            <div class="card">
                <div class="card-body text-center statistics-info">
                    <div class="counter-icon bg-success mb-0 box-success-shadow"> <i
                            class="fe fe-dollar-sign text-white"></i> </div>
                            <h6 class="mt-4 mb-1">Total Categories</h6>
                            <h2 class="mb-2  number-font">{{ \App\Models\Categories::count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xl-6">
            <div class="card">
                <div class="card-body text-center statistics-info">
                    <div class="counter-icon bg-info mb-0 box-info-shadow"> <i class="fe fe-briefcase text-white"></i>
                    </div>
                    <h6 class="mt-4 mb-1">Total Products</h6>
                    <h2 class="mb-2  number-font">{{ \App\Models\Products::count() }}</h2>
                </div>
            </div>
        </div>
    </div>
@endsection
