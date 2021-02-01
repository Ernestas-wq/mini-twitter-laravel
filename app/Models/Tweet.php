<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function boot() {
        parent::boot();
        static::deleting(function($tweet) {
            $tweet->comments()->delete();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'DESC');
    }
    public function retweets() {
        return $this->hasMany(Retweet::class)->orderBy('created_at', 'DESC');
    }
}
