<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    public function menuItem()
    {
        return $this->hasMany(MenuItem::class, 'p_id')->orderBy('position');
    }

    public function childMenuItem()
    {
        return $this->hasMany(MenuItem::class, 'p_id')->with('menuItem')->orderBy('position');
    }
}
