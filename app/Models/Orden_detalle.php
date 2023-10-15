<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden_detalle extends Model
{
    use HasFactory;
    public function user (){

        return $this->belongsTo(User::class);
     }

     public function orden (){

        return $this->belongsTo(Ordene::class);
     }

     public function producto (){

        return $this->belongsTo(Producto::class);
     }
    
    protected $fillable = [
        'cantidad',
        'precio',
        'moneda',
        'total',
      'id_user',
        'id_producto',
     'id_orden'
    ];
    

}
