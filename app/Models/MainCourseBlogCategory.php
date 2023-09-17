<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCourseBlogCategory extends Model
{
    use HasFactory;

    function blogs () {
        return $this->hasMany(MainCourseBlog::class);
    }
}
