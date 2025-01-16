<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company_name',
        'email',
        'phone',
        'zip',
        'country',
        'prefecture',
        'address',
        'description',
    ];

    protected $casts = [
        'zip' => 'string',
    ];
}
