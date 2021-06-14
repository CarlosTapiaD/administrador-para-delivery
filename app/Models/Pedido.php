<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Producto;
use App\Models\Pago;
use App\Models\User;
use App\Models\Image;
class Pedido extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      //  'intFolio',
        'strNota',
        'strEstatus',
        //'strReferencia',
        'user_id',
        //'strTP',

    ];
    //relaciones de tablas
    //1:1
    public function pago(){
        return $this->hasOne(Pago::class);
    }
    // 1:M
    public function user(){
        return $this->belongsTo(User::class);
    }
    //N:M

    public function productos()
    {
     return $this->morphToMany(Producto::class,'productable')->withPivot('cantidad'); 
    }
    
    public function getTotalAttribute(){
        return $this->productos->pluck('total')->sum();
    }
    
}
