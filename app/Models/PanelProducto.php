<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\AvailableScope;

class PanelProducto extends Producto
{
    use HasFactory;

    protected $table = "productos";



    protected static function booted()
    {
       // static::addGlobalScope(new AvailableScope);
    }
}
