<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payment';
    protected $primaryKey = 'pay_id';
    protected $fillable = ['pay_id', 'pay_name'];
    // public $incrementing = false;

    protected $keyType = 'string';
    const CREATED_AT = 'pay_create';
    const UPDATED_AT = 'pay_update';
}
