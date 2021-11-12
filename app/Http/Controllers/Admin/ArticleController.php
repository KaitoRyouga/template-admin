<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\Article\CreateArticleRequest;
use App\Http\Requests\Admin\Article\UpdateArticleRequest;
use App\Models\Articles;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ArticleController extends AdminController
{

    protected $pathView = 'admin.article';
    protected $model = Articles::class;
    protected $folderUpload = "articles";
    protected $controllerName = "article";
    protected $title = "article";
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
                ['label' => 'Tiêu đề', 'name' => 'title', 'type' => 'text'],
                // ['label' => 'Slug', 'name' => 'email', 'type' => 'text'],
                ['label' => 'Keywords', 'name' => 'keywords', 'type' => 'text'],
                ['label' => 'Ảnh', 'name' => 'thumbnail', 'type' => 'file'],
                ['label' => 'Nội dung', 'name' => 'content', 'type' => 'ckeditor'],
                // ['label' => 'Lượt xem', 'name' => 'view', 'type' => 'number']
            ]
        ]

    ];
    protected $listFields = [
        ['label' => 'ID', 'name' => 'id', 'type' => 'text'],
        ['label' => 'Tiêu đề', 'name' => 'title', 'type' => 'text'],
        ['label' => 'Ảnh', 'name' => 'image', 'type' => 'thumb'],
        ['label' => 'Slug', 'name' => 'slug', 'type' => 'text'],
        ['label' => 'Keywords', 'name' => 'keywords', 'type' => 'text'],
        ['label' => 'Nội dung', 'name' => 'content', 'type' => 'content'],
        ['label' => 'Lượt xem', 'name' => 'view', 'type' => 'text'],
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

        $this->rulesCreate = (new CreateArticleRequest())->rules();
        $this->attributesCreate = (new CreateArticleRequest)->attributes();

        $this->rulesUpdate = (new UpdateArticleRequest());
        $this->attributesUpdate = (new UpdateArticleRequest)->attributes();
    }

    public function store(Request $request)
    {

        try {

            $validator = Validator::make($request->all(), $this->rulesCreate, $this->messages, $this->attributesCreate);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $data = $request->all();

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

            $this->model->slug = Str::slug($request->title);
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

                    $image_url = $v;

                    $this->data->image_url = '/storage/images/' . $this->controllerName . '/' . $image_url;
                }

                if ($k != '_token' && !is_array($v)) {

                    if ($k == "password") {

                        $this->data->$k = bcrypt($v);
                    } else {

                        $this->data->$k = $v;
                    }
                }
            }

            $this->data->slug = Str::slug($request->title);
            $this->data->save();

            Session::flash('success', trans('admin.update_success'));
            return redirect()->route('admin.' . $this->controllerName . '.index');
        } catch (\Exception $ex) {

            Session::flash('error', trans('admin.update_error') . '. Lỗi: ' . $ex->getMessage());
            return redirect()->route('admin.' . $this->controllerName . ".index");
        }
    }
}
