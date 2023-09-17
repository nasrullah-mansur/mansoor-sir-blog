<?php

namespace App\Http\Controllers\Back;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VideoGalleryCategory;
use App\DataTables\VideoGalleryDataTable;
use App\Models\VideoGallery;

class VideoGalleryController extends Controller
{
    public function index_category()
    {
        $categories = VideoGalleryCategory::with('items')->orderBy('created_at', 'desc')->get();
        return view('back.gallery.video_category.index', compact('categories'));
    }

    public function create_category()
    {
        return view('back.gallery.video_category.create');
    }

    public function store_category(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:video_gallery_categories'
        ]);

        $category = new VideoGalleryCategory();

        $category->title = $request->title;
        $category->slug = Str::slug($request->title);
        $category->save();

        return redirect()->route('video_gallery_category.index')->with('success', 'Video gallery category added successfully');
    }

    public function edit_category($id)
    {
        $category = VideoGalleryCategory::where('id', $id)->firstOrFail();
        return view('back.gallery.video_category.edit', compact('category'));
    }

    public function update_category(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:video_gallery_categories'
        ]);

        $category = VideoGalleryCategory::where('id', $id)->firstOrFail();

        $category->title = $request->title;
        $category->slug = Str::slug($request->title);
        $category->save();

        return redirect()->route('video_gallery_category.index')->with('success', 'Video gallery category added successfully');
    }

    public function delete_category(Request $request)
    {
        $category = VideoGalleryCategory::where('id', $request->id)->firstOrFail();
        if ($category->items->count() == 0) {
            $category->delete();
            return 'success';
        } else {
            return 'Please remove gallery items first that under this category then try again';
        }
    }

    // ============ Video Gallery ===========
    public function index(VideoGalleryDataTable $dataTable)
    {
        return $dataTable->render('back.gallery.video.index');
    }

    function create()
    {
        $categories = VideoGalleryCategory::all();
        return view('back.gallery.video.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'iframe_link' => 'required|unique:video_galleries',
            'video_gallery_category_id' => 'required'
        ]);

        $gallery = new VideoGallery();
        $gallery->iframe_link = $request->iframe_link;
        $gallery->video_gallery_category_id = $request->video_gallery_category_id;
        $gallery->status = $request->status;
        $gallery->save();

        return redirect()->route('video_gallery.index')->with('success', 'Gallery item added successfully');
    }

    public function edit($id)
    {
        $categories = VideoGalleryCategory::all();
        $gallery = VideoGallery::where('id', $id)->firstOrFail();
        return view('back.gallery.video.edit', compact('categories', 'gallery'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'iframe_link' => 'required|unique:video_galleries',
            'video_gallery_category_id' => 'required'
        ]);

        $gallery = VideoGallery::where('id', $id)->firstOrFail();
        $gallery->iframe_link = $request->iframe_link;
        $gallery->video_gallery_category_id = $request->video_gallery_category_id;
        $gallery->status = $request->status;
        $gallery->save();

        return redirect()->route('video_gallery.index')->with('success', 'Gallery item updated successfully');
    }

    public function delete(Request $request)
    {
        $gallery = VideoGallery::where('id', $request->id)->firstOrFail();
        $gallery->delete();
    }

    // =================== Front =====================;
    public function video_gallery()
    {
        $categories = VideoGalleryCategory::all();
        $galleries = VideoGallery::orderBy('created_at', 'DESC')
            ->where('status', STATUS_ACTIVE)
            ->paginate(6);

        $title = 'Image Gallery';

        return view('front.gallery.video.index', compact('categories', 'galleries', 'title'));
    }

    public function video_gallery_by_category($slug)
    {
        $category = VideoGalleryCategory::where('slug', $slug)->firstOrFail();
        $categories = VideoGalleryCategory::all();
        $galleries = VideoGallery::where('video_gallery_category_id', $category->id)
            ->where('status', STATUS_ACTIVE)
            ->orderBy('created_at', 'DESC')->paginate(6);

        $active_slug = $slug;

        $title = $category->title;

        return view('front.gallery.video.category', compact('categories', 'galleries', 'title', 'active_slug'));
    }
}
