<?php

namespace App\Models;

use Aerni\Spotify\Facades\SpotifyFacade as Spotify;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function songs()
    {
        return $this->hasMany(Song::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function avatar()
    {
        return Spotify::artist($this->spotifyId)->get()['images'][2]['url'];
    }

    public function path($append = '')
    {
        $path = route('artist', $this->slug);

        return $append ? "{$path}/{$append}" : $path;
    }

    public function spotify($attribute = 'name')
    {
        $id = $this->spotifyId;
        return Spotify::artist($id)->get()[$attribute];
    }

    public function postsOrderedByUser()
    {
        return $this->hasMany('Post')->orderByUser();
    }

}
