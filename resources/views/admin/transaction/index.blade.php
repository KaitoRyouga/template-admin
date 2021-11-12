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
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="d-flex  align-items-center">
                        <h3 class="card-title mr-2">{{ ucfirst($title) }} Table</h3>
                        @if (Auth::guard('admin')->user()->can(config('permission.list.' . $controllerName . '.create')))
                            <a class="btn btn-success " href="{{ route('admin.' . $controllerName . '.create') }}">
                                <i class="fas fa-plus"></i>
                                Tạo mới
                            </a>
                        @endif
                    </div>
                    <div class="search float-right">
                        <form class="" action="{{ route('admin.' . $controllerName . '.search') }}" method="get">
                            <div class="input-group"> <input type="text" name="search" class="form-control"
                                    placeholder="Search for...">
                                <span class=""> <button class="btn btn-primary" type="submit"><i
                                            class="fe fe-search"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                @include('admin.' . $controllerName . '.list')
           

          
@endsection
