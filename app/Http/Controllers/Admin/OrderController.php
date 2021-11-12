<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\RequireRequest;
use App\Http\Requests\Admin\Setting\CreateSettingRequest;
use App\Http\Requests\Admin\Setting\UpdateSettingRequest;
use App\Models\Orders;
use App\Models\Setting;
use Illuminate\Support\Facades\Session;

class OrderController extends AdminController
{

    protected $pathView = 'admin.order';
    protected $model = Orders::class;
    protected $folderUpload = "order";
    protected $controllerName = "order";
    protected $title = "order";
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
        ['label' => 'Username', 'name' => 'name', 'type' => 'text_foreign_key', 'data_source' => 'App\Models\User', 'foreign_key' => 'user_id'],
        ['label' => 'Product', 'name' => 'product', 'type' => 'product'],
        ['label' => 'Quantity', 'name' => 'quantity', 'type' => 'quantity'],
        ['label' => 'Total', 'name' => 'total', 'type' => 'money'],
        ['label' => 'Ngày tạo', 'name' => 'created_at', 'type' => 'text'],
        ['label' => 'Ngày sửa', 'name' => 'updated_at', 'type' => 'text'],
        // ['label' => 'Show item', 'name' => 'show item', 'type' => 'button', 'redirect' => "order_item", "key" => "order_id"],
    ];

    public function __construct()
    {
        view()->share('folderUpload', $this->folderUpload);
        view()->share('formFields', $this->formFields);
        view()->share('listFields', $this->listFields);
        view()->share('controllerName', $this->controllerName);
        view()->share('title', $this->title);
        $this->model = new $this->model;

        $this->rulesCreate = (new RequireRequest())->rules(Orders::class);
        $this->attributesCreate = (new RequireRequest)->attributes();

        $this->rulesUpdate = (new RequireRequest())->rules(Orders::class);
        $this->attributesUpdate = (new RequireRequest)->attributes();
    }



    public function index()
    {

        $data = $this->model::orderBy('created_at', 'DESC')->paginate(10);

        // foreach ($data as $key => $value) {

        //     Common::sendTelegram($value->id, $value->link, $value->order_item[0]->product->name, $value->total);
        // }

        return view($this->pathView . '.index')->with([
            'data' => $data
        ]);
    }
}
