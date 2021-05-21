<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function getRouteKeyName() : string
    {
        return 'slug';
    }

    public function path($append = '')
    {
        $path = route('showSong', $this->slug);
        return $append ? "{$path}/{$append}" : $path;
    }

    public function verify()
    {
        $this->isVerified = true;
        $this->save();
        Song::where('idSong', $this->idSong)->get()->except($this->id)->each->extinct();
    }

    public function extinct()
    {
        $this->isOutOfDate = true;
        $this->save();
    }

}
