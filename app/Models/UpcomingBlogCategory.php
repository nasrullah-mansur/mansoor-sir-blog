<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpcomingBlogCategory extends Model
{
    use HasFactory;

    public function blogs()
    {
        return $this->hasMany(UpcomingBlog::class, 'blog_category_id');
    }
}
