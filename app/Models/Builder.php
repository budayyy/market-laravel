<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Builder extends Model
{
    use HasFactory;
    protected $table = 'handyman_service';
    protected $primaryKey = 'hs_id';
    protected $fillable = ['hs_id', 'hs_name', 'hs_phone', 'hs_harga'];
    // public $incrementing = false;

    protected $keyType = 'string';
    const CREATED_AT = 'hs_create';
    const UPDATED_AT = 'hs_update';
}
