<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function replies()
    {
        return $this->hasMany(Comment::class, 'p_id')->where('status', STATUS_ACTIVE);
    }
}
