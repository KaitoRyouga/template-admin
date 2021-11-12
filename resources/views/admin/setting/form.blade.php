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

                        @php
                            $item['data_source'] = \App\Models\Setting::LIST_TYPE;
                            $item['name'] = 'type';
                            $item['label'] = 'Setting type';
                            
                            $items = $item['data_source'];
                            $type = 'array';
                            
                        @endphp
                        <div class="form-group">
                            <label for="{{ $item['name'] }}">Chọn {{ $item['label'] }}:</label>
                            <select id="settingType" name="{{ $item['name'] }}"
                                class="form-control  @error($item['name']) is-invalid @enderror" id="{{ $item['name'] }}">
                                <option value="default">--- Chọn {{ $item['label'] }} --</option>

                                @foreach ($items as $k => $v)
                                    @php
                                        $checked = '';
                                        $old = old($item['name'], @$data[$item['name']]);
                                        if ($old == $k) {
                                            $checked = 'selected';
                                        }
                                    @endphp

                                    <option {{ $checked }} value="{{ $k }}">{{ $v }}</option>

                                @endforeach

                            </select>
                        </div>

                        @foreach ($formFields as $k => $tab)
                            {!! Form::show($tab['items'], $data) !!}
                        @endforeach

                        @php
                            $item['name'] = 'setting_value';
                            $item['label'] = 'Setting value';
                        @endphp

                        @if (empty($data))

                            <div id="settingValue" class="form-group">
                                <label for="{{ $item['name'] }}">{{ $item['label'] }}:</label>
                                <input value="{{ old($item['name'], @$item_model->{$item['name']}) }}"
                                    name="{{ $item['name'] }}" type="text" class="form-control"
                                    id="{{ $item['name'] }}">
                            </div>

                        @else
                            @switch($data->type)
                                @case(1)
                                    <div id="settingValue" class="form-group">
                                        <label for="{{ $item['name'] }}">{{ $item['label'] }}:</label>
                                        <input value="{{ $data->setting_value }}" name="{{ $item['name'] }}" type="text"
                                            class="form-control" id="{{ $item['name'] }}">
                                    </div>
                                @break
                                @case(2)
                                    <div id="settingValue" class="form-group">
                                        <label for="setting_value">Setting value:</label>
                                        <textarea name="setting_value" id="ck_1" rows="10"
                                            cols="80">{!! $data->setting_value !!}</textarea>
                                    </div>
                                @break
                                @case(3)

                                    <div id="settingValue" class="form-group">
                                        <label for="imageFile">Setting value</label>
                                        <div class="custom-file">
                                            <input type="file" id="imageFile" name="setting_value"
                                                accept=".png,.gif,.jpg,.jpeg">
                                        </div>
                                        <div id="error" class="text-danger"></div>
                                    </div>
                                    <div class="image-preview mb-4" id="imagePreview">
                                        <img src="{{ \App\Helper\Common::showThumb($folderUpload, $data->setting_value) }}"
                                            alt="Image Preview" class="image-preview__image" style="display:block;" />
                                        <span class="image-preview__default-text" style="display:none">Hình ảnh</span>
                                    </div>

                                @break
                                @default

                            @endswitch
                        @endif

                        <div class="image-preview mb-4" id="imagePreview">
                        </div>

                        @php
                            $check = explode('/', $_SERVER['REQUEST_URI']);
                            
                            if ($check[count($check) - 1] == 'create') {
                                echo '<input type="submit" value="Tạo" class="btn btn-success float-right">';
                            } else {
                                echo '<input type="submit" value="Cập nhật" class="btn btn-success float-right">';
                            }
                            
                        @endphp
                    </form>

                    <div id="importJS">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        let data = {!! json_encode($data) !!};

        if (data == "") {
            data = data;            
        } else {
            data = data.setting_value;
        }

        $('#settingValue').empty();
        $('.image-preview').empty();

        $text = $(`
                <label for="setting_value">Setting value:</label>
                <input value="${data}" name="setting_value" type="text" class="form-control" id="setting_value">
            `)

        $textarea = $(`
                <label for="setting_value">Setting value:</label>
                <textarea name="setting_value" id="ck_1" rows="10" cols="80">${data}</textarea>
            `)

        $file = $(`
                <label for="imageFile">Setting value</label>
                <div class="custom-file">
                    <input type="file" id="imageFile" name="setting_value" value="/storage/images/setting/thumb/${data}"
                        accept=".png,.gif,.jpg,.jpeg">
                </div>
                <div id="error" class="text-danger"></div>
                <div class="image-preview mb-4" id="imagePreview">
                    <img src="/storage/images/setting/thumb/${data}"
                        alt="Image Preview" class="image-preview__image" style="display:block;" />
                    <span class="image-preview__default-text" style="display:none">Hình ảnh</span>
                </div>
            `)

        let currentId = $('#settingType').val();

        switch (currentId) {

            case "1":
                $('#settingValue').append($text)
                break;

            case "2":
                $('#settingValue').append($textarea)
                // CKEDITOR.replace("ck_1", options);
                break;

            case "3":
                $('#settingValue').append($file)
                break;

            default:
                $('#settingValue').append($text)
                break;
        }

        var myFile = new File([""], `/storage/images/setting/thumb/${data}`);

        if (!myFile.exists) {
            $('.image-preview').empty();
        }

        $('#settingType').on('change', function() {

            let id = this.value;

            $('#settingValue').empty();
            $('.image-preview').empty();

            switch (id) {

                case "1":
                    $('#settingValue').append($text)
                    break;

                case "2":
                    $('#settingValue').append($textarea)
                    var editor = CKEDITOR.instances.ck_1;
                    if (editor) {
                        editor.destroy(true);
                    }
                    CKEDITOR.replace("ck_1", options);
                    break;

                case "3":
                    var myFile = new File([""], `/storage/images/setting/thumb/${data}`);

                    $('#settingValue').append($file)

                    if (!myFile.exists) {
                        $('.image-preview').empty();
                    }

                    break;

                default:
                    $('#settingValue').append($text)
                    break;
            }
        });
    </script>

@endsection
