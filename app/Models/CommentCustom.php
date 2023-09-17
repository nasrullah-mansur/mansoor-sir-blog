<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentCustom extends Model
{
    use HasFactory;


    public function replies()
    {
        return $this->hasMany(CommentCustom::class, 'p_id')->where('status', STATUS_ACTIVE);
    }
}
