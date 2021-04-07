<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory, Likable;

    protected $guarded = [];

    public $keys = ['Ab', 'A', 'A#', 'Bb', 'B', 'C', 'C#', 'Db', 'D','D#', 'Eb', 'E', 'F', 'F#', 'Gb', 'G', 'G#'];


    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function path($append = '')
    {

        $path = route('song', $this->slug);

        return $append ? "{$path}/{$append}" : $path;
    }

}
