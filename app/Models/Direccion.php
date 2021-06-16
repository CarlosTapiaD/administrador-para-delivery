<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Direccion extends Model
{
    use HasFactory;

    protected $fillable = [
        'calles',
        'cp',
        'estado',
        'ciudad',
        'colonia',
        'tel',
        'user_id'

    ];


    protected $dates=[
        'updated-at',
        'create_at'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
