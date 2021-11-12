@if (Auth::guard('admin')->user()->can(config('permission.list.' . $controllerName . '.update')))
    <a href="{{ route('admin.' . $controllerName . '.edit', ['id' => $id]) }}" class="btn "><i
            class="fas fa-edit text-warning"></i></a>
@endif
@if (Auth::guard('admin')->user()->can(config('permission.list.' . $controllerName . '.delete')))
    <a 
        href="{{ route('admin.' . $controllerName . '.delete', ['id' => $id]) }}" class="btn "><i
            class="fas fa-trash-alt text-primary"></i></a>
@endif
