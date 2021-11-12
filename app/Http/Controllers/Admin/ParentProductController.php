<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\RequireRequest;
use App\Http\Requests\Admin\Setting\CreateSettingRequest;
use App\Http\Requests\Admin\Setting\UpdateSettingRequest;
use App\Http\Requests\Admin\UpdateRequest;
use App\Models\Categories;
use App\Models\Order_item;
use App\Models\Orders;
use App\Models\Parent_product;
use App\Models\Products;
use App\Models\Setting;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ParentProductController extends AdminController
{

    protected $pathView = 'admin.parent_product';
    protected $model = Parent_product::class;
    protected $folderUpload = "parent_product";
    protected $controllerName = "parent_product";
    protected $title = "parent product";
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
                ['label' => 'Name', 'name' => 'name', 'type' => 'text'],
                ['label' => 'Select Category', 'name' => 'category_id', 'type' => 'select', 'data_source' => Categories::class, 'foreign_key' => "category_id"],
                ['label' => 'Image', 'name' => 'image', 'type' => 'file'],
            ]
        ]

    ];
    protected $listFields = [
        ['label' => 'ID', 'name' => 'id', 'type' => 'text'],
        ['label' => 'Name', 'name' => 'name', 'type' => 'text'],
        ['label' => 'Image', 'name' => 'image', 'type' => 'thumb'],
        ['label' => 'Category', 'name' => 'name', 'type' => 'text_foreign_key', 'data_source' => Categories::class, 'foreign_key' => 'category_id'],
    ];

    public function __construct()
    {
        view()->share('folderUpload', $this->folderUpload);
        view()->share('formFields', $this->formFields);
        view()->share('listFields', $this->listFields);
        view()->share('controllerName', $this->controllerName);
        view()->share('title', $this->title);
        $this->model = new $this->model;

        $this->rulesCreate = (new RequireRequest())->rules(Parent_product::class);
        $this->attributesCreate = (new RequireRequest)->attributes();

        $this->rulesUpdate = (new UpdateRequest())->rules(Parent_product::class);
        $this->attributesUpdate = (new UpdateRequest)->attributes();
    }

    public function index()
    {

        if (isset($_GET["order_id"])) {

            $data = $this->model::where("order_id", $_GET["order_id"])->orderBy('created_at', 'DESC')->paginate(10);
        } else {

            $data = $this->model->orderBy('created_at', 'DESC')->paginate(10);
        }


        return view($this->pathView . '.index')->with([
            'data' => $data
        ]);
    }


    public function store(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), $this->rulesCreate, $this->messages, $this->attributesCreate);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = $request->all();

            $image_url = "";

            foreach ($data as $k => $v) {

                if (is_object($v)) {
                    $v = $this->upload($v);
                    $image_url = $v;
                }

                if (is_array($v) && count($v) > 0) {
                    if (is_object($v[0])) {
                        $v = $this->uploadmuti($v);
                    }
                }

                if ($k != '_token' && !is_array($v)) {

                    if ($k == "password") {

                        $this->model->$k = bcrypt($v);
                    } else {

                        $this->model->$k = $v;
                    }
                }
            }

            $this->model->image_url = '/storage/images/' . $this->controllerName . '/' . $image_url;
            $this->model->save();

            Session::flash('success', trans('admin.add_success'));
            return redirect()->route('admin.' . $this->controllerName . '.index');
        } catch (\Exception $ex) {

            Session::flash('error', trans('admin.add_error') . '. Lỗi: ' . $ex->getMessage());
            return redirect()->route('admin.' . $this->controllerName . ".create");
        }
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), $this->rulesUpdate, $this->messages, $this->attributesUpdate);

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
            $image_url = "";

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

                    $image_url = $v;

                    $this->data->image_url = '/storage/images/' . $this->controllerName . '/' . $image_url;
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
