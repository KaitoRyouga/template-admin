@php
$image_url = '';

if (!empty($item_model)) {
    $image_url = \App\Helper\Common::getImage($item_model->image, 'thumb', $controllerName);
}

@endphp

<div class="form-group file_picture">
    <label for="{{ $item['name'] }}">{{ $item['label'] }}:</label>
    <input name="{{ $item['name'] }}" type="file"
        class="form-control @error($item['name']) is-invalid @enderror file_picture_one" id="imageFile"
        accept=".png,.gif,.jpg,.jpeg">

    <div class="image-preview mb-4" id="imagePreview">
        <img src="@if (!empty($item_model)) {{ $image_url }} @endif" alt="Image Preview" class="image-preview__image" style="display:block;" />
        <span class="image-preview__default-text" style="display:none">Hình ảnh</span>
    </div>
</div>

<script type="text/javascript">

    function checkImage(url) {
        var request = new XMLHttpRequest();
        request.open("GET", url, true);
        request.send();
        request.onload = function() {
            status = request.status;
            if (request.status != 200) {
                $('.image-preview').empty();
            }
        }
    }

    let data = {!! json_encode($image_url) !!};

    // var myFile = new File([""], data);

    checkImage(data);

</script>
