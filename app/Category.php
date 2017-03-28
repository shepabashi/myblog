<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Category extends Model
{

    protected $fillable = [
      'name', 'slug',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
