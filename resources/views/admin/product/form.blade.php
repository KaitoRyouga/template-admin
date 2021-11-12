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
                    <form id="formProduct" action="{{ $link }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @foreach ($formFields as $k => $tab)
                            {!! Form::show($tab['items'], $data) !!}
                        @endforeach

                        <div id="select_parent" class="form-group">
                            
                        </div>

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

        let is_child = $('select[name="is_child"]').val();

        if(is_child == 0) {

            $('select[name="parent_product_id"]').parent().empty()
        } else {

            $('input[name="image"]').parent().hide();
        }

        $('select[name="is_child"]').on('change', function() {
            if (this.value == 1) {

                $('#select_parent').empty()

                let parent = {!! json_encode(isset($parent) ? $parent : '') !!}

                let html = '';

                parent.forEach(element => {
                    html = html + `<option value="${element.id}">${element.name}</option>       `
                });

                $select = $(`
                    <div class="form-group">
                        <label for="parent_product_id">Select parent:</label>
                        <select name="parent_product_id" class="form-control" id="is_child">
                                <option value="">--- Chọn parent --</option>               
                                ${html}    
                        </select>
                    </div>
                `)

                $select.insertAfter($('select[name="is_child"]').parent())

                $('input[name="image"]').parent().hide();

            } else if (this.value == 0) {

                $('input[name="image"]').parent().show();
                $('#select_parent').empty()
                $('select[name="parent_product_id"]').parent().empty()

            }
        });
    </script>
@endsection
