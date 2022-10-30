<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Images;

class ImageType extends Model
{
    public function images(){
        return $this->hasMany(Images::class, 'img_type', 'id');
    }
}
