<div class="table-responsive">
    <table class="table card-table table-vcenter text-nowrap  align-items-center">
        <thead class="thead-light">
            <tr>
                <th>NAME</th>
                <th>PRICE</th>
                @if (!isset($_GET['parent_id']))
                    <th>IMAGE</th>
                @endif
                <th>CATEGORY</th>
                <th>QUANTITY</th>
                @if (Auth::guard('admin')->user()->can(config('permission.list.' . $controllerName . '.update')) ||
    Auth::guard('admin')->user()->can(config('permission.list.' . $controllerName . '.delete')))
                    <th>ACTION</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @if (!isset($_GET['parent_id']))
                @if ($parent->count() > 0)
                    @foreach ($parent as $k => $item)
                        @php
                            $id = $item->id;
                        @endphp
                        <tr>
                            @foreach ($listFields as $k => $itemField)
                                @switch ($itemField['type'])
                                    @case('text')
                                        @include ("admin.template.table.td_text")
                                    @break
                                    @case('text_foreign_key')
                                        @include ("admin.template.table.td_text_foreign_key")
                                    @break
                                    @case('money')
                                        <td>
                                            <a href="{{ route('admin.product.index', ['parent_id' => $item->id]) }}"
                                                class="btn btn-light">Show child product</a>
                                        </td>
                                    @break
                                    @case('thumb')
                                        <td>
                                            <img style="max-width: 100px"
                                                src="{{ \App\Helper\Common::getImage($item->image_url, 'fullpath') }}"
                                                alt="{{ $item->{$itemField['name']} }}">
                                        </td>
                                    @break
                                    @case('quantity')
                                        <td>
                                            {{ $item->product_child()->count() }}
                                        </td>
                                    @break
                                @endswitch
                            @endforeach

                            @if (Auth::guard('admin')->user()->can(config('permission.list.' . $controllerName . '.update')) ||
                                Auth::guard('admin')->user()->can(config('permission.list.' . $controllerName . '.delete')))
                                <td>
                                    <a href="{{ route('admin.parent_product.edit', ['id' => $id]) }}"
                                        class="btn "><i class="fas fa-edit text-warning"></i></a>
                                    <a onclick="return confirm('Bạn chắc chắn muốn xóa lựa chọn này ?')"
                                        href="{{ route('admin.parent_product.delete', ['id' => $id]) }}"
                                        class="btn "><i class="fas fa-trash-alt text-primary"></i></a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @endif
            @endif

            @if ($data->count() > 0)
                @foreach ($data as $k => $item)
                    @php
                        $id = $item->id;
                    @endphp
                    <tr>
                        @foreach ($listFields as $k => $itemField)
                            @switch ($itemField['type'])
                                @case('text')
                                    @include ("admin.template.table.td_text")
                                @break
                                @case('quantity')
                                    @include ("admin.template.table.td_text")
                                @break
                                @case('text_foreign_key')
                                    @include ("admin.template.table.td_text_foreign_key")
                                @break
                                @case('thumb')
                                    @if (!isset($_GET['parent_id']))
                                        <td>
                                            <img style="max-width: 100px"
                                                src="{{ \App\Helper\Common::getImage($item->image_url, 'fullpath') }}"
                                                alt="{{ $item->{$itemField['name']} }}">
                                        </td>
                                    @endif
                                @break
                                @case('money')
                                    @include ("admin.template.table.td_money")
                                @break
                            @endswitch
                        @endforeach
                        @if (Auth::guard('admin')->user()->can(config('permission.list.' . $controllerName . '.update')) ||
    Auth::guard('admin')->user()->can(config('permission.list.' . $controllerName . '.delete')))
                            <td>@include("admin.template.action")</td>
                        @endif
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
</div>
</div>
</div>
</div>
{{ $data->appends($_GET)->links('admin.pagination.index', ['foo' => 'bar']) }}
</div>
</div>
</div>
