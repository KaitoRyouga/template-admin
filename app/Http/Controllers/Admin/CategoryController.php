<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\RequireRequest;
use App\Http\Requests\Admin\UpdateRequest;
use App\Http\Requests\Admin\User\CreateUserRequest;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class CategoryController extends AdminController
{

    protected $pathView = 'admin.category';
    protected $model = Categories::class;
    protected $folderUpload = "category";
    protected $controllerName = "category";
    protected $title = "category";
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
                ['label' => 'Tên', 'name' => 'name', 'type' => 'text']
            ]
        ]

    ];
    protected $listFields = [
        ['label' => 'ID', 'name' => 'id', 'type' => 'text'],
        ['label' => 'Tên', 'name' => 'name', 'type' => 'text']
    ];

    public function __construct()
    {
        view()->share('folderUpload', $this->folderUpload);
        view()->share('formFields', $this->formFields);
        view()->share('listFields', $this->listFields);
        view()->share('controllerName', $this->controllerName);
        view()->share('title', $this->title);
        $this->model = new $this->model;

        $this->rulesCreate = (new RequireRequest())->rules(Categories::class);
        $this->attributesCreate = (new RequireRequest)->attributes();

        $this->rulesUpdate = (new UpdateRequest())->rules(Categories::class);
        $this->attributesUpdate = (new UpdateRequest)->attributes();
    }
}
