<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpcomingBlog extends Model
{
    use HasFactory;


    public function category()
    {
        return $this->belongsTo(UpcomingBlogCategory::class, 'blog_category_id');
    }
}
