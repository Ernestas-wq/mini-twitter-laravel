<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot() {
        parent::boot();
        static::created(function($user) {
            $user->profile()->create([
                'title' => $user->username
            ]);
        });
    }

    public function isFollowing(User $auth_user, User $user) {
        $isFollowing = DB::table('profile_user')
        ->whereProfileId($user->profile->id)
        ->whereUserId($auth_user->id)->count() > 0;
        return $isFollowing;
    }


    public function following() {
        return $this->belongsToMany(Profile::class);
    }
    public function profile() {
        return $this->hasOne(Profile::class);
    }
    public function tweets() {
        return $this->hasMany(Tweet::class)->orderBy('created_at', 'DESC');
    }
    public function comments(){
        return $this->hasMany(Comment::class)->orderBy('created_at', 'DESC');
    }

}
