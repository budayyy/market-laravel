<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $table = 'shipping';
    protected $primaryKey = 'shp_id';
    protected $fillable = ['shp_id', 'shp_name'];
    // public $incrementing = false;

    protected $keyType = 'string';
    const CREATED_AT = 'shp_create';
    const UPDATED_AT = 'shp_update';
}
