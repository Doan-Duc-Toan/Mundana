<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'content'
    ];
    public function posts(){
        return $this->belongsToMany(Post::class,'post_cat');
    }
}
