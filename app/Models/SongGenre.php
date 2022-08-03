<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SongGenre extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'genre_id',
        'song_id',
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }

    public function song()
    {
        return $this->belongsTo(Song::class, 'song_id');
    }
}
