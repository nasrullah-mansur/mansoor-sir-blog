<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCourseBlog extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(MainCourseBlogCategory::class, 'main_course_blog_category_id');
    }

    public function course()
    {
        return $this->belongsTo(MainCourse::class, 'main_course_id');
    }

}
