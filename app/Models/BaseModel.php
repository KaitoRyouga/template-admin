<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BaseModel extends Model
{

    public static $PER_PAGE = 10;

    public function __construct()
    {
        $className = (new \ReflectionClass($this))->getShortName();

        if (empty($this->folderUpload)) {
            $this->folderUpload = strtolower($className);
        }
    }

    public static function getList(Request $request)
    {

        $limit = $request->limit ? $request->limit : self::$PER_PAGE;

        return self::name($request->name)
            ->paginate($limit);
    }

    public function getImage($type = "")
    {
        if (empty($type)) {
            $path = asset("images/" . $this->folderUpload . "/" . $this->image);
        } else if ($type == "thumb") {
            $path = asset("images/" . $this->folderUpload . "/thumb" . $this->image);
        }

        return $path;
    }
}
