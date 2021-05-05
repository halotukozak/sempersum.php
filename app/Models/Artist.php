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
        $id = $this->spotifyId;
        if ($id) {
            return Spotify::artist($this->spotifyId)->get()['images'][1]['url'];
        }
        return null;
    }

    public function path($append = '')
    {
        $path = route('artist', $this->slug);

        return $append ? "{$path}/{$append}" : $path;
    }

    public function spotify($attribute = 'name')
    {
        $id = $this->spotifyId;
        if ($id) {
            return Spotify::artist($id)->get()[$attribute];
        }
        return null;
    }


}
