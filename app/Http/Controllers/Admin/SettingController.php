<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\Setting\CreateSettingRequest;
use App\Http\Requests\Admin\Setting\UpdateSettingRequest;
use App\Models\Setting;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SettingController extends AdminController
{

    protected $pathView = 'admin.setting';
    protected $model = Setting::class;
    protected $folderUpload = "setting";
    protected $controllerName = "setting";
    protected $title = "Setting";
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
                ['label' => 'Setting key', 'name' => 'setting_key', 'type' => 'text'],
                // ['label' => 'Setting value', 'name' => 'setting_value', 'type' => 'file'],
                // ['label' => 'Setting type', 'name' => 'type', 'type' => 'select', 'data_source' => Setting::LIST_TYPE],
            ]
        ]

    ];
    protected $listFields = [
        ['label' => 'ID', 'name' => 'id', 'type' => 'text'],
        ['label' => 'Setting key', 'name' => 'setting_key', 'type' => 'text'],
        ['label' => 'Setting value', 'name' => 'setting_value', 'type' => 'setting_value'],
        ['label' => 'Setting type', 'name' => 'type', 'type' => 'setting_type'],
    ];

    public function __construct()
    {
        view()->share('folderUpload', $this->folderUpload);
        view()->share('formFields', $this->formFields);
        view()->share('listFields', $this->listFields);
        view()->share('controllerName', $this->controllerName);
        view()->share('title', $this->title);
        $this->model = new $this->model;

        $this->rulesCreate = (new CreateSettingRequest())->rules();
        $this->attributesCreate = (new CreateSettingRequest)->attributes();

        $this->rulesUpdate = (new UpdateSettingRequest());
        $this->attributesUpdate = (new UpdateSettingRequest)->attributes();
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
