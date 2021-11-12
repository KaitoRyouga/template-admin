<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\RequireRequest;
use App\Http\Requests\Admin\Setting\CreateSettingRequest;
use App\Http\Requests\Admin\Setting\UpdateSettingRequest;
use App\Models\Order_item;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Setting;
use Illuminate\Support\Facades\Session;

class OrderItemController extends AdminController
{

    protected $pathView = 'admin.core';
    protected $model = Order_item::class;
    protected $folderUpload = "order_item";
    protected $controllerName = "order_item";
    protected $title = "order item";
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
                // ['label' => 'Setting key', 'name' => 'setting_key', 'type' => 'text'],
                // ['label' => 'Setting value', 'name' => 'setting_value', 'type' => 'file'],
                // ['label' => 'Setting type', 'name' => 'type', 'type' => 'select', 'data_source' => Setting::LIST_TYPE],
            ]
        ]

    ];
    protected $listFields = [
        ['label' => 'ID', 'name' => 'id', 'type' => 'text'],
        ['label' => 'Order_id', 'name' => 'order_id', 'type' => 'text'],
        ['label' => 'Product', 'name' => 'name', 'type' => 'text_foreign_key', 'data_source' => Products::class, 'foreign_key' => 'product_id'],
        ['label' => 'Quantity', 'name' => 'quantity', 'type' => 'text'],
        ['label' => 'Total', 'name' => 'total', 'type' => 'money'],
    ];

    public function __construct()
    {
        view()->share('folderUpload', $this->folderUpload);
        view()->share('formFields', $this->formFields);
        view()->share('listFields', $this->listFields);
        view()->share('controllerName', $this->controllerName);
        view()->share('title', $this->title);
        $this->model = new $this->model;

        $this->rulesCreate = (new RequireRequest())->rules(Order_item::class);
        $this->attributesCreate = (new RequireRequest)->attributes();

        $this->rulesUpdate = (new RequireRequest())->rules(Order_item::class);
        $this->attributesUpdate = (new RequireRequest)->attributes();
    }

    public function index()
    {

        if (isset($_GET["order_id"])) {

            $data = $this->model::where("order_id", $_GET["order_id"])->orderBy('created_at', 'DESC')->paginate(10);
            $data->appends([
                'order_id' => $_GET["order_id"],
            ]);
        } else {

            $data = $this->model::orderBy('created_at', 'DESC')->paginate(10);
        }


        return view($this->pathView . '.index')->with([
            'data' => $data
        ]);
    }
}
