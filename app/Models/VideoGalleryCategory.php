<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoGalleryCategory extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->hasMany(VideoGallery::class);
    }
}
