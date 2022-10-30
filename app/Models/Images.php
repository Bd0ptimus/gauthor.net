<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\User;
use App\Models\ImageType;

class Images extends Model
{
    protected $table='images';
    protected $fillable = [
        'user_id',
        'img_path',
        'img_type',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function imageType(){
        return $this->belongsTo(ImageType::class,  'img_type', 'id');
    }
}
