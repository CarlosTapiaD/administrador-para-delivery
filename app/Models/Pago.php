<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;

class Pago extends Model
{
    use HasFactory;
    protected $fillable = [
        'monto',
        'pedido_id',
        'fecha_pago',
    ];



    public function pedido(){
        return $this->belongsTo(Pedido::class);
    }
}
