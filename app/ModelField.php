<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelField extends Model
{
    protected $table = 'model_fields';
    protected $fillable = ['isFillable', 'migration_field_id', 'name'];
}
