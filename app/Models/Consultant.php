<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    use HasFactory;
    protected $table = 'architect_consultant';
    protected $primaryKey = 'ac_id';
    protected $fillable = ['ac_id', 'ac_name', 'ac_email', 'ac_phone', 'name_pt', 'ac_payment'];
    // public $incrementing = false;

    protected $keyType = 'string';
    const CREATED_AT = 'ac_create';
    const UPDATED_AT = 'ac_update';
}
