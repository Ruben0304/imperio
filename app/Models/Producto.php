<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function vendedor (){

        return $this->belongsTo(Vendedore::class);
     }
    
     public function categoria (){

        return $this->belongsToMany(Categoria::class);
     }
    
     protected $fillable = [
        'nombre',
     'preciocup',
     'preciousd',
     'id_vendedor',
     'foto',
     'stock'
    ];

    


}
