<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoGallery extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(VideoGalleryCategory::class, 'video_gallery_category_id');
    }
}
