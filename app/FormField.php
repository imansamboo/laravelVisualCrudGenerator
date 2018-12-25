<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Crud;

class FormField extends Model
{
    protected $fillable = ['migration_field_id', 'form_field_type', 'form_field_options'];
    protected $table = 'form_fields';
}