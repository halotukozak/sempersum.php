<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

/**
 * App\Models\Songbook
 *
 * @property int $id
 * @property string $name
 * @property int $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Song[] $songs
 * @property-read int|null $songs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\SongbookFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Songbook newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Songbook newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Songbook query()
 * @method static \Illuminate\Database\Eloquent\Builder|Songbook whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Songbook whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Songbook whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Songbook wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Songbook whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Songbook extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = [
        'password',
    ];

    public function getRouteKeyName(): string
    {
        return 'password';
    }

    public function path($append = '')
    {
        $path = route('songbook', $this->password);
        return $append ? "{$path}/{$append}" : $path;
    }

    public function songs()
    {
        return $this->belongsToMany(Song::class)->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
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
