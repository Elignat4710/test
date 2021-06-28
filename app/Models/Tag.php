<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Tag extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'name'
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
