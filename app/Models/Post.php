<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;    
use App\Models\User;    

class Post extends Model
{
    use HasFactory;

    protected $with =["author", "category"];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    protected $fillable = [
        'user_id',
        'category_id',
        'slug',
        "title",
        "excerpt",
        "body"
    ];
}
