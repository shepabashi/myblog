<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Category extends Model
{

    protected $fillable = [
      'name',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Posts()
    {
        return $this->belongsToMany(Post::class)
            ->withPivot('seq');
    }
}
