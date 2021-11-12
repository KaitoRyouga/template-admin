@php
use App\Helper\Form;

if (!isset($data) || !isset($data['listPermission'])) {
    $link = route('admin.' . $controllerName . '.store');
} else {
    $link = route('admin.' . $controllerName . '.update', ['id' => $data['id']]);
}
@endphp
@extends('admin.layouts.master')
@section('page-header')
    <div>
        <h1 class="page-title">{{ strtoupper($title) }}</h1>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card accordion-wizard">
                <div class="card-header">
                    <h3 class="card-title">
                        @if (empty($data) || !isset($data['listPermission']))
                            Tạo mới
                        @else
                            Cập nhật
                        @endif
                    </h3>
                </div>

                <div class="card-body">
                    <form action="{{ $link }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @foreach ($formFields as $k => $tab)
                            {!! Form::show($tab['items'], $data) !!}
                        @endforeach

                        @if (!empty($data) && isset($data['listPermission']))
                            <label class="control-label" for="permission">Gán quyền:</label>
                            <span class="text-red" style="font-weight: 600">*</span>
                            <div class="row">
                                @php
                                
                                    $rolePermission = [];
                                    if (!empty($data) || !isset($data['listPermission'])) {
                                        $rolePermission = $data
                                            ->permissions()
                                            ->pluck('name')
                                            ->toArray();
                                    }
                                    
                                @endphp
                                @if (!empty($data->listPermission))

                                    @foreach ($data->listPermission as $key => $value)
                                        <div class="col-sm-12">
                                            <label class="text-uppercase">
                                                <strong><i><u>{{ trans('permissions.' . $key . '.name') }}</u></i></strong>
                                            </label>
                                        </div>
                                        @foreach ($value as $k => $v)
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label style="cursor: pointer;">
                                                        <input type="checkbox" name="permission[{{ $key . '_' . $k }}]"
                                                            value="{{ $v }}"
                                                            {{ in_array($v, $rolePermission) ? 'checked' : '' }} />
                                                        {{ trans('permissions.' . $v) }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="clearfix"></div>
                                    @endforeach
                                @endif
                            </div>
                            <span class="help-block text-red validation_error hide validation_permission"></span>
                        @else
                            <label class="control-label" for="permission">Gán quyền:</label>
                            <span class="text-red" style="font-weight: 600">*</span>
                            <div class="row">

                                @if (!empty($data))

                                    @foreach ($data as $key => $value)
                                        <div class="col-sm-12">
                                            <label class="text-uppercase">
                                                <strong><i><u>{{ trans('permissions.' . $key . '.name') }}</u></i></strong>
                                            </label>
                                        </div>
                                        @foreach ($value as $k => $v)
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label style="cursor: pointer;">
                                                        <input type="checkbox" name="permission[{{ $key . '_' . $k }}]"
                                                            value="{{ $v }}" checked />
                                                        {{ trans('permissions.' . $v) }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="clearfix"></div>
                                    @endforeach
                                @endif
                            </div>
                            <span class="help-block text-red validation_error hide validation_permission"></span>
                        @endif

                        @if (empty($data) || !isset($data['listPermission']))
                            <input type="submit" value="Tạo" class="btn btn-success float-right">
                        @else
                            <input type="submit" value="Cập nhật" class="btn btn-success float-right">
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
