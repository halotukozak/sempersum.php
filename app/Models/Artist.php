<?php

namespace App\Models;

use Aerni\Spotify\Facades\SpotifyFacade as Spotify;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Artist
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property string|null $website
 * @property string|null $facebook
 * @property string|null $instagram
 * @property string|null $spotify
 * @property string|null $youtube
 * @property string|null $soundcloud
 * @property string|null $deezer
 * @property string|null $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Song[] $songs
 * @property-read int|null $songs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\ArtistFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Artist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Artist query()
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereDeezer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereSoundcloud($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereSpotify($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereYoutube($value)
 * @mixin \Eloquent
 */
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
            return $this->spotify('images')[$size]['url'];
        }
        return null;
    }

    public function path($append = '')
    {
        $path = route('artist', $this->slug);

        return $append ? "{$path}/{$append}" : $path;
    }

    public function spotify($attribute = 'url')
    {
        if ($this->spotify) {
            if ($attribute === 'url') {
                return Spotify::artist($this->spotify)->get()['external_urls']['spotify'];
            }
            return Spotify::artist($this->spotify)->get()[$attribute];
        }
        return null;
    }


}
