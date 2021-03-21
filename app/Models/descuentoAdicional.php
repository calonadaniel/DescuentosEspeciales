<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class descuentoAdicional extends Model
{
    use HasFactory;
    protected $table = 'descuentoAdicional'; 
    public $timestamps = FALSE; //Colocar en true para habilitar la autocreacion de llenado columnas de Created_at y Updated-at
    //public $incrementing = true;
    //Protected $primaryKey = "id";
   
    Protected $fillable = ['itemlookupcode','tipoDesc','descuento',
    'fechaInicia','fechaFinaliza','requisitos'
    ];

    // protected $casts = [
    //     'fechaInicia'  => 'date:Y-m-d',
    //     'fechaFinaliza' => 'date:Y-m-d',
    // ];


    //Relacion con la tabla item, al utilizar rawSQL en el controlador no la requiero 
    public function item() {
        return $this->belongsTo('App\item', 'itemlookupcode');
    }
}
