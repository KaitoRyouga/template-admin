<div class="form-group">
     <label for="{{ $item['name'] }}">{{ $item['label'] }}:</label>
     <input name="{{ $item['name'] }}" type="password" class="form-control @error($item['name']) is-invalid @enderror" id="{{ $item['name'] }}">
 </div>
 