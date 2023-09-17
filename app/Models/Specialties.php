<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialties extends Model
{
    use HasFactory;

    public function courses()
    {
        return $this->hasMany(Course::class, 'specialty_id');
    }
}
