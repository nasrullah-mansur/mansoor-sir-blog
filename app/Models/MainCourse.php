<?php

namespace App\Models;

use App\Models\MainCourseBlogCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MainCourse extends Model
{
    use HasFactory;

    function getBlogRouteAttribute() {
        $category = MainCourseBlogCategory::where('id', $this->blog_link)->first();
        return route('front.main.course.blog.by.category', [$this->slug, $category->slug]);
    }

    function getComplementaryRouteAttribute() {
        $category = MainCourseBlogCategory::where('id', $this->complementary_link)->first();
        return route('front.main.course.blog.by.category', [$this->slug, $category->slug]);
    }

    function getSocialProofRouteAttribute() {
        $category = MainCourseBlogCategory::where('id', $this->social_proof_link)->first();
        return route('front.main.course.blog.by.category', [$this->slug, $category->slug]);
    }

}
