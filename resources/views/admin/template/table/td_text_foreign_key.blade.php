<td>
    @php
        $newItem = new $itemField['data_source'];
        $data = $newItem::findOrFail($item->{$itemField['foreign_key']});
        echo $data->{$itemField['name']};
    @endphp
</td>
