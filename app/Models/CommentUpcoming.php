<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentUpcoming extends Model
{
    use HasFactory;

    public function replies()
    {
        return $this->hasMany(CommentUpcoming::class, 'p_id')->where('status', STATUS_ACTIVE);
    }
}
