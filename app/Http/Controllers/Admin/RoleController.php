<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Common;
use App\Http\Requests\Admin\Role\CreateRoleRequest;
use App\Http\Requests\Admin\Role\SearchRoleRequest;
use App\Http\Requests\Admin\Role\UpdateRoleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Artisan;

class RoleController extends AdminController
{

    protected $pathView = 'admin.role';
    protected $model = Role::class;
    protected $folderUpload = "role";
    protected $controllerName = "role";
    protected $title = "Nhóm quyền";
    protected $data;
    protected $updateData;

    protected $formFields = [
        [
            'items' => [
                ['label' => 'Tên nhóm quyền', 'name' => 'name', 'type' => 'text']
            ]
        ]

    ];
    protected $listFields = [
        ['label' => 'ID', 'name' => 'id', 'type' => 'text'],
        ['label' => 'Tên nhóm quyền', 'name' => 'name', 'type' => 'text'],
    ];

    public function __construct()
    {
        view()->share('folderUpload', $this->folderUpload);
        view()->share('formFields', $this->formFields);
        view()->share('listFields', $this->listFields);
        view()->share('controllerName', $this->controllerName);
        view()->share('title', $this->title);
        $this->model = new $this->model;
    }

    public function index()
    {

        Common::clearCache();

        $data = $this->model::orderBy('created_at', 'DESC')->paginate(10);

        return view($this->pathView . '.index')->with([
            'data' => $data
        ]);
    }

    public function create()
    {
        $this->data = config('permission.list');
        return view($this->pathView . '.form')->with([
            'data' => $this->data
        ]);
    }

    public function search(Request $request)
    {
        $this->validate($request, (new SearchRoleRequest())->rules(), [], (new SearchRoleRequest())->attributes());

        $data = $this->model::orderBy('created_at', 'DESC')->paginate(10);

        return view($this->pathView . '.search')->with([
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, (new CreateRoleRequest)->rules(), [], (new CreateRoleRequest())->attributes());

        try {

            $role = Role::create(['name' => $request->name, 'guard_name' => 'admin']);

            $role->syncPermissions($request->permission);

            Common::clearCache();

            Session::flash('success', trans('admin.add_success'));
            return redirect()->route('admin.' . $this->controllerName . ".index");
        } catch (\Exception $ex) {

            Session::flash('error', trans('admin.add_error') . '. Lỗi: ' . $ex->getMessage());
            return redirect()->route('admin.' . $this->controllerName . ".index");
        }
    }

    public function edit($id)
    {
        $this->data = $this->model::findOrFail($id);
        $this->data['listPermission'] = config('permission.list');

        return view($this->pathView . '.form')->with([
            'data' => $this->data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $this->model::findOrFail($id);

        if (empty($data)) {

            Session::flash('error', trans('admin.data_not_exists'));
            return redirect()->route('admin.' . $this->controllerName . '.index');
        }

        $this->validate(
            $request,
            (new UpdateRoleRequest())->rules(),
            [],
            (new UpdateRoleRequest())->attributes()
        );

        try {

            $role = Role::find($id);
            $role->name = $request->input('name');
            $role->save();

            $role->syncPermissions([]);
            $role->givePermissionTo($request->input('permission'));

            Common::clearCache();

            Session::flash('success', trans('admin.update_success'));
            return redirect()->route('admin.' . $this->controllerName . '.index');
        } catch (\Exception $ex) {

            Session::flash('error', trans('admin.update_error') . '. Lỗi: ' . $ex->getMessage());
            return redirect()->route('admin.' . $this->controllerName . ".index");
        }
    }
}
