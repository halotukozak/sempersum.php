<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spotify;

class Song extends Model
{
    use HasFactory, Likable, SoftDeletes;

    protected $guarded = [];

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function songbooks()
    {
        return $this->belongsToMany(Songbook::class)->withTimestamps();
    }

    public function getRouteKeyName() : string
    {
        return 'slug';
    }

    public function path($append = '')
    {
        $path = route('showSong', $this->slug);
        return $append ? "{$path}/{$append}" : $path;
    }

    public function verify() :void
    {
        $this->update(['isVerified' => true]);
        $olds = Song::where('idSong', $this->idSong)->get()->except($this->id);
        $olds->each->extinct();
        $ids = $olds->pluck('id');
        Like::whereIn('song_id', $ids)->update(['song_id' => $this->id]);
    }

    public function cover()
    {
        if ($this->spotifyId) {
            return Spotify::track($this->spotifyId)->get('album')['images'][1]['url'];
        } else {
            return null;
        }
    }

    public function extinct()
    {
        $this->update(['isOutOfDate' => true]);
    }

}
