<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Trait\UserActionable;
class Customer extends Model
{
    use HasFactory,UserActionable;

    protected $fillable = [
        'name',
        'user_belong_id',
        'company_name',
        'invoice_number',
        'email',
        'phone',
        'zip',
        'country',
        'prefecture',
        'address',
        'description',

        'create_user_id',
        'update_user_id',
        'delete_user_id',
    ];

    protected $casts = [
        'zip' => 'string',
    ];
}
