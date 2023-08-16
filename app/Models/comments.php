<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;
    protected $fillable =['content','post_id','user_id'];
    public function Post(){
        return $this->belongsTo(BlogPost::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
