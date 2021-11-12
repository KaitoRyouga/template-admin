<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\RequireRequest;
use App\Http\Requests\Admin\UpdateRequest;
use App\Http\Requests\Admin\User\CreateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserController extends AdminController
{

    protected $pathView = 'admin.user';
    protected $model = User::class;
    protected $folderUpload = "user";
    protected $controllerName = "user";
    protected $title = "user";
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
                // ['label' => 'Password', 'name' => 'password', 'type' => 'text'],
                ['label' => 'First Name', 'name' => 'firstName', 'type' => 'text'],
                ['label' => 'Last Name', 'name' => 'lastName', 'type' => 'text'],
                ['label' => 'Balance', 'name' => 'balance', 'type' => 'number'],
            ]
        ]

    ];
    protected $listFields = [
        ['label' => 'ID', 'name' => 'id', 'type' => 'text'],
        ['label' => 'Tên', 'name' => 'name', 'type' => 'text'],
        ['label' => 'Email', 'name' => 'email', 'type' => 'text'],
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

        $this->rulesCreate = (new CreateUserRequest())->rules(User::class);
        $this->attributesCreate = (new CreateUserRequest)->attributes();

        $this->rulesUpdate = (new UpdateRequest())->rules(User::class);
        $this->attributesUpdate = (new UpdateRequest)->attributes();
    }
}
