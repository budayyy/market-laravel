<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retail extends Model
{
    use HasFactory;
    protected $table = "retail";
    protected $primaryKey = 'rtl_id';
    protected $fillable = ['rtl_id', 'rtl_status'];
    // public $incrementing = false;

    protected $keyType = 'string';
    const CREATED_AT = 'rtl_create';
    const UPDATED_AT = 'rtl_update';
}
