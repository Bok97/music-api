<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'user_id',
        'genre_id',
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }
}
