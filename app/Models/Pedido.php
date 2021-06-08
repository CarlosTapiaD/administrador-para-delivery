<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Producto;
class Pedido extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'intFolio',
        'strNota',
        'strEstatus',
        'strReferencia',
        'usuario_id',
        'strTP',

    ];

    public function productos()
    {
     return $this->belongsToMany(Producto::class)->withPivot('cantidad'); 
    }
}
