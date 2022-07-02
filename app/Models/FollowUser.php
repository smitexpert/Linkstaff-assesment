<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'follow_id',
    ];

    public function posts()
    {
        return $this->hasMany(UserPost::class, 'id', 'user_id');
    }
}
