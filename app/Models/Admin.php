<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'administrator';
    protected $primaryKey = 'adm_id';
    protected $fillable = ['adm_id', 'adm_name', 'adm_email', 'adm_phone', 'adm_username', 'picture', 'adm_password', 'role_id'];
    // public $incrementing = false;

    protected $keyType = 'string';
    const CREATED_AT = 'adm_create';
    const UPDATED_AT = 'adm_update';
}
