<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alis extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'aliss';

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
    protected $fillable = ['ali'];

    
}
