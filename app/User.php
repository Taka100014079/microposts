<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;



class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function microposts()
    {
        return $this->hasMany(Micropost::class);
    }
    
    public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }
    public function follow($userId)
{
    // すでに登録しているか確認
    $exist = $this->is_following($userId);
    // 自分でないか確認
    $its_me = $this->id == $userId;

    if ($exist || $its_me) {
        // すでにフォロー済みなら何もしない
        return false;
    } else {
        // フォローしてなきゃ新しくフォローする
        $this->followings()->attach($userId);
        return true;
    }
}

public function unfollow($userId)
{
    // すでに登録しているか確認
    $exist = $this->is_following($userId);
    // 自分でないか確認
    $its_me = $this->id == $userId;


    if ($exist && !$its_me) {
        // すでにフォローしていればフォロー外す
        $this->followings()->detach($userId);
        return true;
    } else {
        // フォローしていなければ何もしない
        return false;
    }
}


public function is_following($userId) {
    return $this->followings()->where('follow_id', $userId)->exists();
}

 public function feed_microposts()
    {
        $follow_user_ids = $this->followings()-> pluck('users.id')->toArray();
        $follow_user_ids[] = $this->id;
        return Micropost::whereIn('user_id', $follow_user_ids);
    }    
 public  function favorites_microposts()
 {  return $this->belongsToMany(Micropost::class, 'user_favorites', 'user_id', 'favorites_id')->withTimestamps();}
    

 public function like($likeId)
{
    // すでに登録しているか確認
    $exist = $this->is_liking($likeId);
    

    if ($exist) {
        // すでにフォロー済みなら何もしない
        return false;
    } else {
        // フォローしてなきゃ新しくフォローする
        $this->favorites_microposts()->attach($likeId);
        return true;
    }
}

public function unlike($likeId)
{
    // すでに登録しているか確認
    $exist = $this->is_liking($likeId);


    if ($exist) {
        // すでにフォローしていればフォロー外す
        $this->favorites_microposts()->detach($likeId);
        return true;
    } else {
        // フォローしていなければ何もしない
        return false;
    }
}


public function is_liking($likeId) {
    return $this->favorites_microposts()->where('favorites_id', $likeId)->exists();
}
}