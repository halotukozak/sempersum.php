<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Builder;

trait Likable
{

    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select song_id, sum(liked) likes from likes group by song_id',
            'likes',
            'likes.song_id',
            'songs.id'
        );
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function like($user = null)
    {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id()
        ], [
            'liked' => true
        ]);
    }

    public function dislike($user = null)
    {
        $user ? $id = $user->id : $id = current_user()->id;
        return $this->likes()
            ->where('user_id', '=', $id)
            ->update(['liked' => 0
            ]);
    }

    public function isLikedBy(User $user = null) :bool
    {
        if (!$user) return false;
        if(!$user->likes) return false;
        return (bool)$user->likes
            ->where('song_id', $this->id)
            ->where('liked', true)
            ->count();
    }
}
