<?php

namespace App\Models;

use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class Setting extends Model
{
    use HasFactory;

    const HOME_SEO_TITLE                = 'home_seo_title';
    const HOME_SEO_DESCRIPTION          = 'home_seo_description';
    const HOME_SEO_KEYWORD              = 'home_seo_keyword';
    const HOME_SEO_IMAGE                = 'home_seo_image';
    const LOGO                          = 'logo';
    const BANNER                          = 'banner';

    const INPUT_TEXT = 1;
    const INPUT_TEXTAREA = 2;
    const INPUT_MEDIA = 3;

    const LIST_TYPE = array(
        self::INPUT_TEXT => 'Text',
        self::INPUT_TEXTAREA => 'Text Area',
        self::INPUT_MEDIA => 'Media'
    );

    const LIST_KEY = [
        self::HOME_SEO_TITLE        => 'Tiêu đề SEO trang chủ',
        self::HOME_SEO_DESCRIPTION  => 'Mô tả SEO trang chủ',
        self::HOME_SEO_KEYWORD      => 'Từ khóa SEO trang chủ',
        self::HOME_SEO_IMAGE        => 'Ảnh SEO trang chủ'
    ];

    protected $fillable = [
        'setting_key', 'setting_value', 'type'
    ];

    protected $table = "settings";
    // protected $folderUpload = "";

    // public function scopeSettingKey($query, $key)
    // {
    //     return !empty($key) ? $query->where('setting_key', $key) : $query;
    // }

    // public static function getList(Request $request)
    // {
    //     $limit = $request->post('limit') ? $request->post('limit') : self::$PER_PAGE;
    //     return self::settingKey($request->setting_key)
    //         ->paginate($limit);
    // }
}
