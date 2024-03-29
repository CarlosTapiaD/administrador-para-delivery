<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Categoria;
use App\Models\Pedido;
use App\Models\Carrito;
use App\Scopes\AvailableScope;
use App\Models\Image;
class Producto extends Model
{  
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $with=[
        'images',
    ];
    protected $fillable = [
        'strNombre',
        'intVisible',
        'strDescripcion',
        'dcPrecio',
        'categoria_id',
        'urlImg',

    ];
    
    protected static function booted()
    {
        static::addGlobalScope(new AvailableScope);
    }
    

    public function categoria(){
        return $this->belongsTo(Categoria::class,'categoria_id');
    }
    public function pedidos()
    {
        return $this->morphedByMany(Pedido::class,'productable')->withPivot('cantidad'); 
    }
    public function carritos()
    {
     return $this->morphedByMany(Carrito::class,'productable')->withPivot('cantidad'); 
    }

    public function getTotalAttribute(){
        return $this->pivot->cantidad * $this->dcPrecio;
    }

    public function scopeVisible($query){
        $query->where('intVisible',1);
    }

    public function images(){
        return $this->morphMany(Image::class,'imageable');
    }

    
}
