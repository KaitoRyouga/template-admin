<div class="form-group">
    <label for="{{ $item['name'] }}">{{ $item['label'] }}:</label>
    <textarea class="form-control @error($item['name']) is-invalid @enderror" name="{{ $item['name'] }}" id="ck_1" rows="10" cols="80">{{ old($item['name'], @$item_model->{$item['name']}) }}</textarea>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace("ck_1", options);
    </script>
</div>
