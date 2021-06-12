<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Relations\Morph;

class Carrito extends Model
{
    use HasFactory;


    public function productos(){
        return $this->morphToMany(Producto::class,'productable')->withPivot('cantidad');
    }

    public function getTotalAttribute(){
        return $this->productos->pluck('total')->sum();
    }
}
