<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usertype extends Model
{
    use HasFactory;
    protected $table = 'role';

    protected $fillable = [
        'name',
        'description'
    ];

    /**
     * A role can have many users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user() {
                                                //Foreign key  //Local key
        return $this->belongsToMany('App\User','roleID','id');
    }
}
