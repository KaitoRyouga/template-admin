<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\Administrator\CreateAdministratorRequest;
use App\Http\Requests\Admin\Administrator\UpdateAdministratorRequest;
use App\Models\Administrator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class AdministratorController extends AdminController
{

    protected $pathView = 'admin.administrator';
    protected $model = Administrator::class;
    protected $folderUpload = "administrator";
    protected $controllerName = "administrator";
    protected $title = "administrator";
    protected $data;
    protected $updateData;
    protected $messages = [];
    protected $rulesCreate;
    protected $attributesCreate;
    protected $rulesUpdate;
    protected $attributesUpdate;

    protected $formFields = [
        [
            'items' => [
                ['label' => 'Tên', 'name' => 'name', 'type' => 'text'],
                ['label' => 'Email', 'name' => 'email', 'type' => 'text'],
                ['label' => 'Quyền', 'name' => 'role', 'type' => 'select', 'data_source' => Role::class, 'foreign_key' => 'role'],
                // ['label' => 'Ngày tạo', 'name' => 'created_at', 'type' => 'text'],
                // ['label' => 'Ngày sửa', 'name' => 'updated_at', 'type' => 'text'],
            ]
        ]

    ];
    protected $listFields = [
        ['label' => 'ID', 'name' => 'id', 'type' => 'text'],
        ['label' => 'Tên', 'name' => 'name', 'type' => 'text'],
        ['label' => 'Email', 'name' => 'email', 'type' => 'text'],
        ['label' => 'Quyền', 'name' => 'role', 'type' => 'role'],
        ['label' => 'Ngày tạo', 'name' => 'created_at', 'type' => 'text'],
        ['label' => 'Ngày sửa', 'name' => 'updated_at', 'type' => 'text'],
    ];

    public function __construct()
    {
        view()->share('folderUpload', $this->folderUpload);
        view()->share('formFields', $this->formFields);
        view()->share('listFields', $this->listFields);
        view()->share('controllerName', $this->controllerName);
        view()->share('title', $this->title);
        $this->model = new $this->model;

        $this->rulesCreate = (new CreateAdministratorRequest())->rules();
        $this->attributesCreate = (new CreateAdministratorRequest)->attributes();

        $this->rulesUpdate = (new UpdateAdministratorRequest());
        $this->attributesUpdate = (new UpdateAdministratorRequest)->attributes();
    }

    public function index()
    {
        $data = $this->model::orderBy('created_at', 'DESC')->paginate(20);

        return view($this->pathView . '.index')->with([
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), $this->rulesUpdate->rules($id), $this->messages, $this->attributesUpdate);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $this->data = $this->model::findOrFail($id);

        if (empty($this->data)) {

            Session::flash('error', trans('admin.data_not_exists'));
            return redirect()->route('admin.' . $this->controllerName . '.index');
        }

        try {

            $dataRequest = $request->all();

            foreach ($dataRequest as $k => $v) {

                if (is_object($v)) {

                    if ($this->data->$k == "") {

                        $v = $this->upload($v);
                    } else {

                        if (file_exists(public_path($this->data->$k))) {

                            unlink(public_path($this->data->$k));
                        }

                        $v = $this->upload($v);
                    }
                }

                if (is_array($v) && count($v) > 0) {

                    if (is_object($v[0])) {

                        $picture = json_decode($this->data->$k);

                        foreach ($picture as $p) {

                            if (file_exists(public_path($p))) {

                                unlink(public_path($p));
                            }
                        }

                        $v = $this->uploadmuti($v);
                    }
                }

                if ($k != '_token' && !is_array($v)) {

                    if ($k == "password") {

                        $this->data->$k = bcrypt($v);
                    } elseif ($k == "role") {

                        $this->data->$k = $v;
                        // dd($this->data->roles()->pluck('name'));
                        // $roles = $this->data->getRoleNames();  
                        $this->data->syncRoles([]);
                        $this->data->assignRole(Role::select("name")->where('id', $v)->first()->name);
                    } else {

                        $this->data->$k = $v;
                    }
                }
            }
            $this->data->save();

            Session::flash('success', trans('admin.update_success'));
            return redirect()->route('admin.' . $this->controllerName . '.index');
        } catch (\Exception $ex) {

            Session::flash('error', trans('admin.update_error') . '. Lỗi: ' . $ex->getMessage());
            return redirect()->route('admin.' . $this->controllerName . ".index");
        }
    }
}
