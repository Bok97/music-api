<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'album_id',
        'name',
    ];

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }
}
