<?php

namespace App;

use GlideImage;
use Kodeine\Acl\Traits\HasRole;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, HasRole, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function profileImage($w = 175, $h = 145){
        $params = ['w' => $h, 'h' => $h];
        if( is_null($this->profile_photo) ){
            $glide = GlideImage::load('default-image.jpg')->modify($params);
            return "<img src='$glide'>";
        } else{
            $glide = GlideImage::load($this->profile_photo)->modify($params);
            return "<img src='$glide'>";
        }
        //return '<img src="{{ GlideImage::load(default-image.jpg)->modify($params) }}">';

    }
}
