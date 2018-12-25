<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MigrationField;

class Crud extends Model
{
    protected $fillable = ['name'];


    public function migrationFields()
    {
        return $this->hasMany(MigrationField::class);
    }




}