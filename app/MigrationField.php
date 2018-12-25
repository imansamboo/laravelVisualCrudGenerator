<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Crud;

class MigrationField extends Model
{
    protected $fillable = ['crud_id', 'type', 'options', 'name', 'nullable'];
    protected $table = 'migration_fields';

    public function migration()
    {
        return $this->belongsTo(Crud::class);
    }


}