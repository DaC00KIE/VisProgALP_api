<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * 
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'bio',
        'location',
        'display_name',
        'profile_picture'
    ];


    public function bookmarks(): HasOne
    {
        return $this->hasOne(Bookmark::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follows_users', 'follower_id', 'user_id');
    }

    public function followings(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follows_users', 'user_id', 'follower_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
