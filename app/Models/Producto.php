<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Categoria;
use App\Models\Pedido;
class Producto extends Model
{  
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'strNombre',
        'intVisible',
        'strDescripcion',
        'dcPrecio',
        'categoria_id',
        'urlImg',

    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class,'categoria_id');
    }
    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class)->withPivot('cantidad'); 
    }

    public function scopeVisible($query){
        $query->where('intVisible',1);
    }
}
