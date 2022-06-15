<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'user_id',
        'post_id'
    ];

    // fix this later in resources
    protected $casts = [
        'created_at' => 'date:Y-m-d H:m',
        'updated_at' => 'date:Y-m-d H:m',
    ];
}
