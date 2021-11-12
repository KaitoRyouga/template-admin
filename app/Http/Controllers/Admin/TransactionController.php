<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\RequireRequest;
use App\Http\Requests\Admin\UpdateRequest;
use App\Models\Articles;
use App\Models\Transactions;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class TransactionController extends AdminController
{

    protected $pathView = 'admin.transaction';
    protected $model = Transactions::class;
    protected $folderUpload = "transaction";
    protected $controllerName = "transaction";
    protected $title = "transaction";
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
                // ['label' => 'Tiêu đề', 'name' => 'title', 'type' => 'text'],
                ['label' => 'Trạng thái', 'name' => 'status', 'type' => 'select', 'data_source' => ['Đang chờ', 'Hoàn thành']],
                // ['label' => 'Keywords', 'name' => 'created_at', 'type' => 'text'],
                // ['label' => 'Nội dung', 'name' => 'updated_at', 'type' => 'text'],
                // ['label' => 'Lượt xem', 'name' => 'updated_at', 'type' => 'number']
            ]
        ]

    ];
    protected $listFields = [
        ['label' => 'ID', 'name' => 'id', 'type' => 'text'],
        ['label' => 'Username', 'name' => 'name', 'type' => 'text_foreign_key', 'data_source' => User::class, 'foreign_key' => 'user_id'],
        ['label' => 'Input', 'name' => 'input', 'type' => 'money'],
        ['label' => 'Số điện thoại', 'name' => 'phone', 'type' => 'text'],
        ['label' => 'Trạng thái', 'name' => 'status', 'type' => 'status'],
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

        $this->rulesCreate = (new RequireRequest())->rules(Transactions::class);
        $this->attributesCreate = (new RequireRequest)->attributes();

        $this->rulesUpdate = (new UpdateRequest())->rules(Transactions::class);
        $this->attributesUpdate = (new UpdateRequest)->attributes();
    }

    public function update(Request $request, $id)
    {

        try {

            $this->data = $this->model::findOrFail($id);

            $this->data->status = $request->status;
            $this->data->save();

            $user = User::find($this->data->user_id);

            User::where('id', $user->id)->update([
                'balance' => $user->balance + $this->data->input
            ]);

            Session::flash('success', trans('admin.update_success'));
            return redirect()->route('admin.' . $this->controllerName . '.index');
        } catch (\Exception $ex) {

            Session::flash('error', trans('admin.update_error') . '. Lỗi: ' . $ex->getMessage());
            return redirect()->route('admin.' . $this->controllerName . ".index");
        }
    }
}
