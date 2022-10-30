<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Models
use App\Models\User;

class Role extends Model
{
    protected $table = "roles";
    public function user(){
        return $this->belongsTo(User::class,'id', 'role_id');
    }
}
