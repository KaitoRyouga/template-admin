<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\Product\CreateProductRequest;
use App\Http\Requests\Admin\RequireRequest;
use App\Http\Requests\Admin\Setting\CreateSettingRequest;
use App\Http\Requests\Admin\Setting\UpdateSettingRequest;
use App\Http\Requests\Admin\Product\UpdateProductRequest;
use App\Http\Requests\Admin\SearchRequest;
use App\Http\Requests\Admin\UpdateRequest;
use App\Models\Categories;
use App\Models\Order_item;
use App\Models\Orders;
use App\Models\Parent_product;
use App\Models\Products;
use App\Models\Setting;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductController extends AdminController
{

    protected $pathView = 'admin.product';
    protected $model = Products::class;
    protected $folderUpload = "product";
    protected $controllerName = "product";
    protected $title = "product";
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
                ['label' => 'Is Child', 'name' => 'is_child', 'type' => 'select', 'data_source' => ["no", "yes"]],
                ['label' => 'Select Parent', 'name' => 'parent_product_id', 'type' => 'select', 'data_source' => Parent_product::class, 'foreign_key' => "parent_product_id"],
                ['label' => 'Select Category', 'name' => 'category_id', 'type' => 'select', 'data_source' => Categories::class, 'foreign_key' => "category_id"],
                ['label' => 'Name', 'name' => 'name', 'type' => 'text'],
                ['label' => 'Image', 'name' => 'image', 'type' => 'file'],
                ['label' => 'Price', 'name' => 'price', 'type' => 'number'],
                ['label' => 'Quantity', 'name' => 'quantity', 'type' => 'number'],
                ['label' => 'Discount', 'name' => 'discount', 'type' => 'number'],
                ['label' => 'Min', 'name' => 'min', 'type' => 'number'],
                ['label' => 'Max', 'name' => 'max', 'type' => 'number'],
            ]
        ]

    ];
    protected $listFields = [
        // ['label' => 'ID', 'name' => 'id', 'type' => 'text'],
        ['label' => 'Name', 'name' => 'name', 'type' => 'text'],
        ['label' => 'Image', 'name' => 'image', 'type' => 'thumb'],
        ['label' => 'Price', 'name' => 'price', 'type' => 'money'],
        ['label' => 'Category', 'name' => 'name', 'type' => 'text_foreign_key', 'data_source' => Categories::class, 'foreign_key' => 'category_id'],
        ['label' => 'Quantity', 'name' => 'quantity', 'type' => 'quantity'],

    ];

    public function __construct()
    {
        view()->share('folderUpload', $this->folderUpload);
        view()->share('formFields', $this->formFields);
        view()->share('listFields', $this->listFields);
        view()->share('controllerName', $this->controllerName);
        view()->share('title', $this->title);
        $this->model = new $this->model;

        $this->rulesCreate = (new CreateProductRequest());
        $this->attributesCreate = (new CreateProductRequest)->attributes();

        $this->rulesUpdate = (new UpdateProductRequest());
        $this->attributesUpdate = (new UpdateProductRequest)->attributes();
    }

    public function index()
    {

        if (!isset($_GET["parent_id"])) {

            $data = $this->model::where("is_child", 0)
                ->orderBy('created_at', 'DESC')
                ->paginate(10);

            $parent = Parent_product::orderBy('created_at', 'DESC')->paginate(10);

            return view($this->pathView . '.index')->with([
                'data' => $data,
                'parent' => $parent
            ]);
        } else {
            $data = $this->model::where("is_child", 1)
                ->where('parent_product_id', $_GET["parent_id"])
                ->orderBy('created_at', 'DESC')
                ->paginate(10);
            $data->appends([
                'parent_id' => $_GET["parent_id"],
            ]);
            return view($this->pathView . '.index')->with([
                'data' => $data
            ]);
        }
    }

    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), (new SearchRequest())->rules(), [], (new SearchRequest())->attributes());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $search = "";
        $param = $request->search;

        foreach ($this->model->getFillable() as $key => $value) {

            $search .= $value . ' LIKE "%' . $param . '%" OR ';
        }

        $searchParent = "";
        $parent_product = new Parent_product();

        foreach ($parent_product->getFillable() as $key => $value) {

            $searchParent .= $value . ' LIKE "%' . $param . '%" OR ';
        }

        if (!isset($request->parent_id)) {

            $data = $this->model::where("is_child", 0)
                ->whereRaw(substr($search, 0, -4))
                ->paginate(10);

            $parent = Parent_product::whereRaw(substr($searchParent, 0, -4))->orderBy('created_at', 'DESC')->paginate(10);

            return view($this->pathView . '.index')->with([
                'data' => $data,
                'parent' => $parent
            ]);
        } else {

            $data = $this->model::where("is_child", 1)
                ->whereRaw(substr($search, 0, -4))
                ->where('parent_product_id', $request->parent_id)
                ->orderBy('created_at', 'DESC')
                ->paginate(10);

            return view($this->pathView . '.index', ['parent_id' => $request->parent_id, "search" => $request->search])->with([
                'data' => $data
            ]);
        }
    }

    public function create()
    {
        $parent = Parent_product::all();
        return view($this->pathView . '.form')->with([
            'data' => $this->data,
            'parent' => $parent
        ]);
    }

    public function store(Request $request)
    {

        try {

            $validator = Validator::make($request->all(), $this->rulesCreate->rules(Products::class, $request->all()), $this->messages, $this->attributesCreate);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = $request->all();

            foreach ($data as $k => $v) {

                if (is_object($v)) {
                    $v = $this->upload($v);

                    $image_url = $v;

                    $this->model->image_url = '/storage/images/' . $this->controllerName . '/' . $image_url;
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

            $this->model->save();

            Session::flash('success', trans('admin.add_success'));
            return redirect()->route('admin.' . $this->controllerName . '.index');
        } catch (\Exception $ex) {

            Session::flash('error', trans('admin.add_error') . '. Lỗi: ' . $ex->getMessage());
            return redirect()->route('admin.' . $this->controllerName . ".create");
        }
    }

    public function edit($id)
    {

        $this->data = $this->model::findOrFail($id);

        if (empty($this->data)) {

            Session::flash('error', trans('admin.data_not_exists'));
            return redirect()->route('admin.' . $this->controllerName . '.index');
        }

        $parent = Parent_product::all();

        return view($this->pathView . '.form')->with([
            'data' => $this->data,
            'parent' => $parent
        ]);
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), $this->rulesUpdate->rules(Products::class, $request->all()), $this->messages, $this->attributesUpdate);

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

            if ($request->is_child == 0) {
                $this->data->parent_product_id = null;
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
