<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $primaryKey = 'ctg_id';
    protected $fillable = ['ctg_id', 'ctg_name'];
    // public $incrementing = false;

    protected $keyType = 'string';
    const CREATED_AT = 'ctg_create';
    const UPDATED_AT = 'ctg_update';
}
