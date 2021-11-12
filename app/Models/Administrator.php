<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Administrator extends Authenticatable
{
    use HasRoles, HasFactory, Notifiable;

    protected $guard_name = 'admin';

    public static $PER_PAGE = 30;
    const ROLE_ADMINISTRATOR = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get list
     *
     * @param Request $request
     * @return mixed
     */
    public static function getList(Request $request)
    {
        $limit = $request->post('limit') ? $request->post('limit') : self::$PER_PAGE;
        return self::name($request->name)
            ->paginate($limit);
    }
}
