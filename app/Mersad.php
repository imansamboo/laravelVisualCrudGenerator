<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mersad extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mersads';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['family','age','group'];

    
}
