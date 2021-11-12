@php
use App\Helper\Form;
if (!isset($data)) {
    $data = [];
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
                        @if (empty($data))
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
                        @if (empty($data))
                            <input type="submit" value="Tạo" class="btn btn-success float-right">
                        @else
                            <input type="submit" value="Cập nhật" class="btn btn-success float-right">
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {

            var editor = CKEDITOR.instances.ck_1;
            
            if (editor) {
                console.log(123)
                editor.destroy(true);
            }
            CKEDITOR.replace("ck_1", options);

        });
    </script>

@endsection
