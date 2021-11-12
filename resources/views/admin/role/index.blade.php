@extends('admin.layouts.master')
@section('css')
@endsection
@section('page-header')
    <div>
        <h1 class="page-title">{{ strtoupper($title) }}</h1>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ ucwords($title) }} Table</h3>
                    <form action="" method="get">
                    </form>
                </div>
                <div class="table-responsive">
                    @include('admin.role.list')
                </div>
            </div>
        </div>
    </div>
@endsection
