<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Songbook extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function songs()
    {
        return $this->belongsToMany(Song::class)->withTimestamps();;
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();;
    }

    public function toggleSong(Song $song)
    {
        $this->songs()->toggle([
            'song_id' => $song->id
        ]);
    }

    public function changePermission(User $user = null)
    {
        $this->users()->toggle([
            $user ? $user->id : current_user()->id
        ]);
    }


}
