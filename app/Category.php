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
     * Get the value of the model's route key.
     *
     * @return mixed
     */
    public function getRouteKeyName()
    {
        return 'slug';

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
