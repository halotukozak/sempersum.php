<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spotify;

/**
 * App\Models\Song
 *
 * @property int $id
 * @property int|null $idSong
 * @property string $slug
 * @property string $title
 * @property string $text
 * @property string|null $spotifyId
 * @property string|null $deezerId
 * @property string|null $youtubeId
 * @property string|null $soundcloudId
 * @property int $isVerified
 * @property int $isOutOfDate
 * @property string $key
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $artist_id
 * @property int|null $author_id
 * @property-read \App\Models\Artist|null $artist
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Like[] $likes
 * @property-read int|null $likes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Songbook[] $songbooks
 * @property-read int|null $songbooks_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Database\Factories\SongFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Song newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Song newQuery()
 * @method static \Illuminate\Database\Query\Builder|Song onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Song query()
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereArtistId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereDeezerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereIdSong($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereIsOutOfDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereIsVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereSoundcloudId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereSpotifyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereYoutubeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song withLikes()
 * @method static \Illuminate\Database\Query\Builder|Song withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Song withoutTrashed()
 * @mixin \Eloquent
 */
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
