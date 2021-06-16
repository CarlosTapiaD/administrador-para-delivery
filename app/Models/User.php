<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Pago;
use App\Models\Image;
use App\Models\Direccion;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'strTipoUsuario',
        'api_token',
        'admin_since',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        // 'api_token',

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $dates=[
        'admin_since',
    ];



    public function generateToken()
    {
         $this->api_token = Str::random(60);
         $this->save();
         return $this->api_token;
    }

    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }
    public function pagos(){
        return $this->hasManyThrough(Pago::class,Pedido::class);
    }
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
    public function isAdmin(){
        return $this->admin_since !=null && $this->admin_since->lessThanOrEqualTo(now());
    }

    public function direccion(){
         return $this->hasOne(Direccion::class);
    }
    public function setPasswordAttribute($password){
        $this->attributes['password']= bcrypt($password);
    }


}
