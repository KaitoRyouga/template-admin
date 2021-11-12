<?php

namespace App\Helper;

use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Http;

class Common
{
     public static function showThumb($folderUpload, $image)
     {
          if (isset($image)) {
               return asset('/storage/images/' . $folderUpload . "/thumb/" . $image);
          } else {
               return '';
          }
     }

     public static function getImage($image, $type = "", $folderUpload = "")
     {
          if (empty($type)) {
               $path = asset("/storage/images/" . $folderUpload . "/" . $image);
          } else if ($type == "thumb") {
               $path = asset("/storage/images/" . $folderUpload . "/thumb/" . $image);
          } else if ($type == "fullpath") {
               
               $path = asset($image);
          }

          return $path;
     }

     public static function getSetting($key)
     {

          $setting = Setting::where('setting_key', $key)->first();
          if (empty($setting)) {
               return '';
          }

          return $setting->setting_value;
     }

     public static function clearCache()
     {
          try {

               Artisan::call('cache:forget spatie.permission.cache');
               Artisan::call('cache:clear');
               Artisan::call('config:clear');
               Artisan::call('route:clear');
               Artisan::call('view:clear');
          } catch (\Exception $ex) {

               Session::flash('error', trans('admin.error') . '. Lỗi: ' . $ex->getMessage());
               return redirect('/ad');
          }
     }

     public static function milliseconds()
     {
          $mt = explode(' ', microtime());
          return ((int)$mt[1]) * 1000 + ((int)round($mt[0] * 1000));
     }

     public static function createName($name, $slug, $extension)
     {
          return $name . $slug . '_' . self::milliseconds() . '.' . $extension;
     }

     public function resizeThumb($request, $slug = null)
     {
          if ($request->hasFile('image')) {

               if ($request->file('image')->isValid()) {

                    $extension = $request->thumbnail->extension();
                    $name = self::createName($this->controllerName, $slug, $extension);
                    $request->thumbnail->storeAs('images/' . $this->folderUpload, $name);
                    $image_path = $request->file('image');
                    $image = Image::make($image_path);
                    $x400_image = $image->resize(400, null, function ($constraint) {
                         $constraint->aspectRatio();
                    })->encode($extension);

                    Storage::put('images/' . $this->folderUpload . "/thumb/$name", $x400_image);
                    Storage::put('images/' . $this->folderUpload . "/$name", $image);

                    return [
                         'image' => $name,
                         "url_image" => $_SERVER["HTTP_HOST"] . "/storage/images/" . $this->folderUpload . "/$name"
                    ];
               }
          }
     }

     public static function formatMoney($money, $currency = null)
     {
          return number_format($money, -3, '.', '.') . "$currency";
     }

     public static function sendTelegram($id, $url, $name, $price)
     {
          $message = '%23' . $id . ' | ' . Carbon::now() . ' | ' . Auth::user()->name . '%0D%0A' . $url . '%0D%0A' . $name . ' | ' . $price;
          $send = "https://api.telegram.org/bot1990572928:AAFQGikxIqQ4JReEH9G1bysqIu4h0oh2wFE/sendMessage?chat_id=-1001598273120&text=" . $message;
          Http::get($send);
     }

     public static function sendTelegramMoney($id, $price)
     {
          $message = '%23' . $id . ' | ' . Carbon::now() . ' | ' . Auth::user()->name . '%0D%0A' . $price;
          $send = "https://api.telegram.org/bot1990572928:AAFQGikxIqQ4JReEH9G1bysqIu4h0oh2wFE/sendMessage?chat_id=-1001598273120&text=" . $message;
          Http::get($send);
     }

}
