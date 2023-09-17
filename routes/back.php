<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Back\BlogController;
use App\Http\Controllers\Back\MenuController;
use App\Http\Controllers\MainCourseController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\Back\BannerController;
use App\Http\Controllers\BlogSidebarController;
use App\Http\Controllers\SpecialtiesController;
use App\Http\Controllers\Back\BlogTagController;
use App\Http\Controllers\UpcomingBlogController;
use App\Http\Controllers\AdvertizementController;
use App\Http\Controllers\CommentCustomController;
use App\Http\Controllers\ContactSectionController;
use App\Http\Controllers\MainCourseBlogController;
use App\Http\Controllers\Back\AppearanceController;
use App\Http\Controllers\Back\CustomPageController;
use App\Http\Controllers\CommentUpcomingController;

use App\Http\Controllers\Back\BlogCategoryController;
use App\Http\Controllers\Back\VideoGalleryController;
use App\Http\Controllers\UpcomingBlogCategoryController;
use App\Http\Controllers\MainCourseBlogCategoryController;

Route::middleware(['auth'])->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // =====================================
    // ======================== Admin Routes 
    // =====================================
    Route::group(['middleware' => ['admin']], function () {

        Route::prefix('admin')->group(function () {

            // Blog Categories;
            Route::get('blog/categories', [BlogCategoryController::class, 'index'])->name('blog.category.index');
            Route::get('blog/category/create', [BlogCategoryController::class, 'create'])->name('blog.category.create');
            Route::post('blog/category/store', [BlogCategoryController::class, 'store'])->name('blog.category.store');
            Route::get('blog/category/edit/{id}', [BlogCategoryController::class, 'edit'])->name('blog.category.edit');
            Route::post('blog/category/update/{id}', [BlogCategoryController::class, 'update'])->name('blog.category.update');
            Route::post('blog/category/delete', [BlogCategoryController::class, 'delete'])->name('blog.category.delete');
            
            // Blog Categories;
            Route::get('up-blog/categories', [UpcomingBlogCategoryController::class, 'index'])->name('up.blog.category.index');
            Route::get('up-blog/category/create', [UpcomingBlogCategoryController::class, 'create'])->name('up.blog.category.create');
            Route::post('up-blog/category/store', [UpcomingBlogCategoryController::class, 'store'])->name('up.blog.category.store');
            Route::get('up-blog/category/edit/{id}', [UpcomingBlogCategoryController::class, 'edit'])->name('up.blog.category.edit');
            Route::post('up-blog/category/update/{id}', [UpcomingBlogCategoryController::class, 'update'])->name('up.blog.category.update');
            Route::post('up-blog/category/delete', [UpcomingBlogCategoryController::class, 'delete'])->name('up.blog.category.delete');

            // Blog Tags;
            Route::get('blog/tags', [BlogTagController::class, 'index'])->name('blog.tag.index');
            Route::get('blog/tag/create', [BlogTagController::class, 'create'])->name('blog.tag.create');
            Route::post('blog/tag/store', [BlogTagController::class, 'store'])->name('blog.tag.store');
            Route::get('blog/tag/edit/{id}', [BlogTagController::class, 'edit'])->name('blog.tag.edit');
            Route::post('blog/tag/update/{id}', [BlogTagController::class, 'update'])->name('blog.tag.update');
            Route::post('blog/tag/delete', [BlogTagController::class, 'delete'])->name('blog.tag.delete');

            // Blogs;
            Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
            Route::get('blog/create', [BlogController::class, 'create'])->name('blog.create');
            Route::post('blog/store', [BlogController::class, 'store'])->name('blog.store');
            Route::get('blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
            Route::post('blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
            Route::post('blog/delete', [BlogController::class, 'delete'])->name('blog.delete');

            // Comment;
            Route::get('comment', [CommentController::class, 'index'])->name('comment.index');
            Route::get('comment/status/{id}', [CommentController::class, 'status'])->name('comment.status');
            Route::post('comment/delete', [CommentController::class, 'delete'])->name('comment.delete');

            // Comment upcoming courses;
            Route::get('comment/upcoming', [CommentUpcomingController::class, 'index'])->name('comment.upcoming.index');
            Route::get('comment/upcoming/status/{id}', [CommentUpcomingController::class, 'status'])->name('comment.upcoming.status');
            Route::post('comment/upcoming/delete', [CommentUpcomingController::class, 'delete'])->name('comment.upcoming.delete');

            // Comment upcoming courses;
            Route::get('comment/custom', [CommentCustomController::class, 'index'])->name('comment.custom.index');
            Route::get('comment/custom/status/{id}', [CommentCustomController::class, 'status'])->name('comment.custom.status');
            Route::post('comment/custom/delete', [CommentCustomController::class, 'delete'])->name('comment.custom.delete');
            
            // Blogs;
            Route::get('up-blog', [UpcomingBlogController::class, 'index'])->name('up.blog.index');
            Route::get('up-blog/create', [UpcomingBlogController::class, 'create'])->name('up.blog.create');
            Route::post('up-blog/store', [UpcomingBlogController::class, 'store'])->name('up.blog.store');
            Route::get('up-blog/edit/{id}', [UpcomingBlogController::class, 'edit'])->name('up.blog.edit');
            Route::post('up-blog/update/{id}', [UpcomingBlogController::class, 'update'])->name('up.blog.update');
            Route::post('up-blog/delete', [UpcomingBlogController::class, 'delete'])->name('up.blog.delete');

            // Appearance;
            Route::get('appearance/edit', [AppearanceController::class, 'edit'])->name('appearance.edit');
            Route::post('appearance/update', [AppearanceController::class, 'update'])->name('appearance.update');

            // Menu;
            Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
            Route::post('/menu/store', [MenuController::class, 'store'])->name('menu.store');
            Route::post('/menu/update/{id}', [MenuController::class, 'update'])->name('menu.update');
            Route::post('/menu/delete', [MenuController::class, 'delete'])->name('menu.delete');

            // Menu Item;
            Route::get('/menu/{slug}', [MenuController::class, 'menuItem'])->name('menuItem.index');
            Route::post('/add/item', [MenuController::class, 'addItem'])->name('menuItem.addItem');
            Route::post('/menu/item/store/{menu_id}', [MenuController::class, 'menuItemStore'])->name('menuItem.store');
            Route::post('/menu/item/update', [MenuController::class, 'menuItemUpdate'])->name('menuItem.update');
            Route::post('/menu/item/delete', [MenuController::class, 'menuItemDelete'])->name('menuItem.delete');

            // Video Gallery Category;
            Route::get('gallery/video/categories', [VideoGalleryController::class, 'index_category'])->name('video_gallery_category.index');
            Route::get('gallery/video/category/create', [VideoGalleryController::class, 'create_category'])->name('video_gallery_category.create');
            Route::post('gallery/video/category/store', [VideoGalleryController::class, 'store_category'])->name('video_gallery_category.store');
            Route::get('gallery/video/category/edit/{id}', [VideoGalleryController::class, 'edit_category'])->name('video_gallery_category.edit');
            Route::post('gallery/video/category/update/{id}', [VideoGalleryController::class, 'update_category'])->name('video_gallery_category.update');
            Route::post('gallery/video/category/delete', [VideoGalleryController::class, 'delete_category'])->name('video_gallery_category.delete');

            // Video Gallery;
            Route::get('gallery/videos', [VideoGalleryController::class, 'index'])->name('video_gallery.index');
            Route::get('gallery/video/create', [VideoGalleryController::class, 'create'])->name('video_gallery.create');
            Route::post('gallery/video/store', [VideoGalleryController::class, 'store'])->name('video_gallery.store');
            Route::get('gallery/video/edit/{id}', [VideoGalleryController::class, 'edit'])->name('video_gallery.edit');
            Route::post('gallery/video/update/{id}', [VideoGalleryController::class, 'update'])->name('video_gallery.update');
            Route::post('gallery/video/delete', [VideoGalleryController::class, 'delete'])->name('video_gallery.delete');



            // Subscriber;
            Route::get('/subscribers', [SubscriberController::class, 'index'])->name('subscriber.index');
            Route::post('/subscriber/delete', [SubscriberController::class, 'delete'])->name('subscriber.delete');




            // ********************** Sections ********************

            // Banner;
            Route::get('banner', [BannerController::class, 'edit'])->name('banner.edit');
            Route::post('banner', [BannerController::class, 'update'])->name('banner.update');

            // Specialties;
            Route::get('specialties/images', [SpecialtiesController::class, 'index'])->name('specialties.index');
            Route::get('specialties/image/create', [SpecialtiesController::class, 'create'])->name('specialties.create');
            Route::post('specialties/image/store', [SpecialtiesController::class, 'store'])->name('specialties.store');
            Route::get('specialties/image/edit/{id}', [SpecialtiesController::class, 'edit'])->name('specialties.edit');
            Route::post('specialties/image/update/{id}', [SpecialtiesController::class, 'update'])->name('specialties.update');
            Route::post('specialties/image/delete', [SpecialtiesController::class, 'delete'])->name('specialties.delete');


            // Blog sidebar;
            Route::get('blog/sidebar', [BlogSidebarController::class, 'index'])->name('blog.sidebar');
            Route::post('blog/sidebar', [BlogSidebarController::class, 'update'])->name('blog.sidebar.update');


            // Advertizement;
            Route::get('advertizement/images', [AdvertizementController::class, 'index'])->name('advertizement.index');
            Route::get('advertizement/image/create', [AdvertizementController::class, 'create'])->name('advertizement.create');
            Route::post('advertizement/image/store', [AdvertizementController::class, 'store'])->name('advertizement.store');
            Route::get('advertizement/image/edit/{id}', [AdvertizementController::class, 'edit'])->name('advertizement.edit');
            Route::post('advertizement/image/update/{id}', [AdvertizementController::class, 'update'])->name('advertizement.update');
            Route::post('advertizement/image/delete', [AdvertizementController::class, 'delete'])->name('advertizement.delete');

            // Contact Section;
            Route::get('contact/section', [ContactSectionController::class, 'edit'])->name('contact.section');
            Route::post('contact/section', [ContactSectionController::class, 'update'])->name('contact.section.update');


            // ***************** Contact From Contact Form *******************;

            Route::get('contact', [ContactController::class, 'index'])->name('user.contact');
            Route::get('contact/{id}', [ContactController::class, 'show'])->name('user.contact.show');
            Route::post('contact/delete', [ContactController::class, 'delete'])->name('user.contact.delete');
            Route::post('contact/reply', [ContactController::class, 'reply'])->name('user.contact.reply');


            // Course;
            Route::get('course', [CourseController::class, 'index'])->name('course.index');
            Route::get('course/create', [CourseController::class, 'create'])->name('course.create');
            Route::post('course/store', [CourseController::class, 'store'])->name('course.store');
            Route::get('course/edit/{id}', [CourseController::class, 'edit'])->name('course.edit');
            Route::post('course/update/{id}', [CourseController::class, 'update'])->name('course.update');
            Route::post('course/delete', [CourseController::class, 'delete'])->name('course.delete');
            
            
            // Social;
            Route::get('social', [SocialController::class, 'index'])->name('social.index');
            Route::get('social/create', [SocialController::class, 'create'])->name('social.create');
            Route::post('social/store', [SocialController::class, 'store'])->name('social.store');
            Route::get('social/edit/{id}', [SocialController::class, 'edit'])->name('social.edit');
            Route::post('social/update/{id}', [SocialController::class, 'update'])->name('social.update');
            Route::post('social/delete', [SocialController::class, 'delete'])->name('social.delete');
            
            // Custom Page;
            Route::get('custom-pages', [CustomPageController::class, 'index'])->name('custom.page.index');
            Route::get('custom-pages/create', [CustomPageController::class, 'create'])->name('custom.page.create');
            Route::post('custom-pages/store', [CustomPageController::class, 'store'])->name('custom.page.store');
            Route::get('custom-pages/edit/{id}', [CustomPageController::class, 'edit'])->name('custom.page.edit');
            Route::post('custom-pages/update/{id}', [CustomPageController::class, 'update'])->name('custom.page.update');
            Route::post('custom-pages/delete', [CustomPageController::class, 'delete'])->name('custom.page.delete');

            // Main Course;
            Route::get('pro-course/blog/categories', [MainCourseBlogCategoryController::class, 'index'])->name('main.course.blog.category.index');
            Route::get('pro-course/blog/category/create', [MainCourseBlogCategoryController::class, 'create'])->name('main.course.blog.category.create');
            Route::post('pro-course/blog/category/store', [MainCourseBlogCategoryController::class, 'store'])->name('main.course.blog.category.store');
            Route::get('pro-course/blog/category/edit/{id}', [MainCourseBlogCategoryController::class, 'edit'])->name('main.course.blog.category.edit');
            Route::post('pro-course/blog/category/update/{id}', [MainCourseBlogCategoryController::class, 'update'])->name('main.course.blog.category.update');
            Route::post('pro-course/blog/category/delete', [MainCourseBlogCategoryController::class, 'delete'])->name('main.course.blog.category.delete');
            

            // Main Course Blog;
            Route::get('main-course/blogs', [MainCourseBlogController::class, 'index'])->name('main.course.blog.index');
            Route::get('main-course/blog/create', [MainCourseBlogController::class, 'create'])->name('main.course.blog.create');
            Route::post('main-course/blog/store', [MainCourseBlogController::class, 'store'])->name('main.course.blog.store');
            Route::get('main-course/blog/edit/{id}', [MainCourseBlogController::class, 'edit'])->name('main.course.blog.edit');
            Route::post('main-course/blog/update/{id}', [MainCourseBlogController::class, 'update'])->name('main.course.blog.update');
            Route::post('main-course/blog/create', [MainCourseBlogController::class, 'delete'])->name('main.course.blog.delete');

            // Main Course;
            Route::get('our-courses', [MainCourseController::class, 'index'])->name('main.course.index');
            Route::get('our-courses/create', [MainCourseController::class, 'create'])->name('main.course.create');
            Route::post('our-courses/store', [MainCourseController::class, 'store'])->name('main.course.store');
            Route::get('our-courses/edit/{id}', [MainCourseController::class, 'edit'])->name('main.course.edit');
            Route::post('our-courses/update/{id}', [MainCourseController::class, 'update'])->name('main.course.update');
            Route::post('our-courses/delete', [MainCourseController::class, 'delete'])->name('main.course.delete');
        });
    });
});
