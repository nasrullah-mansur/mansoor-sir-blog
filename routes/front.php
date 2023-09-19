<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Back\VideoGalleryController;
use App\Http\Controllers\CommentCustomController;
use App\Http\Controllers\CommentUpcomingController;
use App\Http\Controllers\MainCourseController;

Route::get('/', [FrontController::class, 'index'])->name('welcome');

// Blog;

Route::get('/blogs', [FrontController::class, 'blogs'])->name('front.blog');
Route::get('/blog/{slug}', [FrontController::class, 'single_blog'])->name('single.blog');
Route::get('/blogs/category/{slug}', [FrontController::class, 'blog_by_category'])->name('blog.by.category');
Route::get('/blogs/tag/{slug}', [FrontController::class, 'blog_by_tag'])->name('blog.by.tag');
Route::post('blog/by/search', [FrontController::class, 'blog_by_search_get'])->name('blog.by.search.get');
Route::get('blog/by/search/{key}', [FrontController::class, 'blog_by_search_set'])->name('blog.by.search.set');


// Comment;
Route::post('comment/store', [CommentController::class, 'store'])->name('comment.store');
Route::post('comment/upcoming/store', [CommentUpcomingController::class, 'store'])->name('comment.upcoming.store');
Route::post('comment/custom/store', [CommentCustomController::class, 'store'])->name('comment.custom.store');

// Upcoming Blog;
// Route::get('/upcoming-blogs', [FrontController::class, 'up_blogs'])->name('front.up.blog');
Route::get('/upcoming-blog/{slug}', [FrontController::class, 'up_single_blog'])->name('single.up.blog');
Route::get('/upcoming-blogs/category/{slug}', [FrontController::class, 'up_blog_by_category'])->name('up.blog.by.category');


// Chambers;
Route::get('chambers', [FrontController::class, 'chambers'])->name('front.chamber');
Route::post('chambers/find', [FrontController::class, 'chambers_by_search_set'])->name('front.chamber.set');
Route::get('chambers/find/{day}/{time}', [FrontController::class, 'chambers_by_search_get'])->name('front.chamber.get');

// Subscriber;
Route::post('subscriber/store', [SubscriberController::class, 'store'])->name('subscriber.store');

// Contact;
Route::post('user/contact/store', [ContactController::class, 'contact_store'])->name('user.contact.store');
Route::get('contact', [ContactController::class, 'front_page'])->name('contact.page');

// Youtube video;
Route::get('/gallery/video', [VideoGalleryController::class, 'video_gallery'])->name('video.gallery');
Route::get('/gallery/video/category/{slug}', [VideoGalleryController::class, 'video_gallery_by_category'])->name('video.gallery.category');

// Course;
Route::get('courses/{slug}', [CourseController::class, 'front_course_by_category'])->name('front.courses');

// Custom page;
Route::get('pages/{slug}', [FrontController::class, 'custom_page'])->name('front.custom.page');

// ==================== Main Course ============================
Route::get('our/courses', [MainCourseController::class, 'front_courses'])->name('front.main.courses');

// Main Course Blog;
Route::get('blogs/{course}/{category}', [MainCourseController::class, 'front_main_course_blog_by_category'])->name('front.main.course.blog.by.category');
Route::get('/course/{course_slug}/blogs/{blog_slug}', [MainCourseController::class, 'front_single_blog'])->name('main.course.single.blog');

