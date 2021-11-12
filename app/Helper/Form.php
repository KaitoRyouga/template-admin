<?php

namespace App\Helper;

class Form
{

    public static function show($arr, $item_model)
    {
        $html = '';

        foreach ($arr as $item) {
            
            $data['item'] = $item;
            $data['item_model'] = $item_model;

            switch ($item['type']) {

                case "text";
                    $html .= view("admin.template.form.input_text")->with($data)->render();
                    break;

                case "number";
                    $html .= view("admin.template.form.input_number")->with($data)->render();
                    break;

                case "email";
                    $html .= view("admin.template.form.input_email")->with($data)->render();
                    break;

                case "file_multi";
                    $html .= view("admin.template.form.file_multi")->with($data)->render();
                    break;

                case "ckeditor";
                    $html .= view("admin.template.form.ckeditor")->with($data)->render();
                    break;

                case "file";
                    $html .= view("admin.template.form.file")->with($data)->render();
                    break;

                case "password";
                    $html .= view("admin.template.form.password")->with($data)->render();
                    break;

                case "textarea";
                    $html .= view("admin.template.form.textarea")->with($data)->render();
                    break;

                case "select";
                    $html .= view("admin.template.form.select")->with($data)->render();
                    break;

                case "tag";
                    $html .= view("admin.template.form.tag")->with($data)->render();
                    break;
            }
        }
        return $html;
    }
}
