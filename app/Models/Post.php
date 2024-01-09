<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bookmark;
use App\Models\Ingredient;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookmarks()
    {
        return $this->belongsToMany(Bookmark::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'post_ingredients', 'ingredient_id', 'post_id');
    }

    public function liked(){
        return $this->belongsToMany(User::class, 'user_like', 'user_id', 'post_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
