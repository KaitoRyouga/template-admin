<td>
    <a href="{{ route('admin.' . $itemField['redirect'] . '.index', [$itemField['key'] => $item->id]) }}" class="btn btn-light">{{ $itemField['name'] }}</a>
</td>
