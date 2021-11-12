<?php

namespace App\Http\Controllers;

use App\Helper\Common;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Admin\SearchRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class AdminController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $model;

    public function index()
    {
        $data = $this->model::orderBy('created_at', 'DESC')->paginate(10);

        return view($this->pathView . '.index')->with([
            'data' => $data
        ]);
    }

    public function create()
    {
        return view($this->pathView . '.form')->with([
            'data' => $this->data
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

            foreach ($data as $k => $v) {

                if (is_object($v)) {
                    $v = $this->upload($v);
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

        $data = $this->model::whereRaw(substr($search, 0, -4))->paginate(10);

        return view($this->pathView . '.index')->with([
            'data' => $data
        ]);
    }

    public function edit($id)
    {

        $this->data = $this->model::findOrFail($id);

        if (empty($this->data)) {

            Session::flash('error', trans('admin.data_not_exists'));
            return redirect()->route('admin.' . $this->controllerName . '.index');
        }

        return view($this->pathView . '.form')->with([
            'data' => $this->data
        ]);
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

    public function delete($id)
    {
        try {
            $this->data = $this->model::findOrFail($id);

            if (empty($this->data)) {

                Session::flash('error', trans('admin.data_not_exists'));
                return redirect()->route('admin.' . $this->controllerName . '.index');
            }

            $this->data->delete();
            Session::flash('success', trans('admin.delete_success'));

            return redirect()->route('admin.' . $this->controllerName . ".index");
        } catch (\Exception $ex) {

            Session::flash('error', trans('admin.delete_error') . '. Lỗi: ' . $ex->getMessage());
            return redirect()->route('admin.' . $this->controllerName . ".index");
        }
    }

    public function upload($file)
    {
        try {

            // $filenameHash = Str::random(5) . '.' . $file->getClientOriginalExtension();
            // $file->storeAs('images/' . $this->folderUpload . "/", $filenameHash);

            $extension = $file->extension();
            $name = Common::createName($this->controllerName, null, $extension);
            $file->storeAs('images/' . $this->folderUpload, $name);
            $image_path = $file;
            $image = Image::make($image_path);
            $x400_image = $image->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode($extension);

            Storage::put('images/' . $this->folderUpload . "/thumb/$name", $x400_image);

            return $name;
        } catch (\Exception $ex) {

            Session::flash('error', trans('admin.add_error') . '. Lỗi: ' . $ex->getMessage());
            return redirect()->route('admin.' . $this->controllerName . ".index");
        }
    }

    public function uploadmuti($files)
    {
        $data = [];

        foreach ($files as $file) {
            $data[] = $this->upload($file);
        }

        return json_encode($data);
    }
}
