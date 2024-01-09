<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bookmark;
use App\Models\Ingrediient;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [

    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function bookmarks():BelongsToMany{
        return $this->belongsToMany(Bookmark::class);
    }

    public function ingredients():HasMany{
        return $this->hasMany(Ingrediient::class);
    }
}
