<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;
    protected $fillable =['title','body','user_id'];
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(comments::class,'post_id');
    }
}
