<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MigrationField;

class Crud extends Model
{
    protected $fillable = ['name'];


    public function migrationField()
    {
        return $this->belongsToMany(MigrationField::class);
    }




}