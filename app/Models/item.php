<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    use HasFactory;
    protected $table = 'item';
    public $incrementing = false;

    public function descuentoAdicional()
    {
        return $this->hasMany('App\descuentoAdicional','itemlookupcode','itemlookupcode');
    }
}
