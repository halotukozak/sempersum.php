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

    public function avatar($size = 'sm')
    {
        if ($this->spotify) {
            switch ($size) {
                case 'sm':
                    $size = 2;
                    break;
                case 'md':
                    $size = 1;
                    break;
                case 'lg':
                    $size = 0;
                    break;
            }
            return Spotify::artist($this->spotify)->get()['images'][$size]['url'];
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
        if ($this->spotify) {
            if ($attribute = 'url') {
                return Spotify::artist($this->spotify)->get()['external_urls']['spotify'];
            }
            return Spotify::artist($this->spotify)->get()[$attribute];
        }
        return null;
    }


}
