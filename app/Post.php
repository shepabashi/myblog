<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use phpDocumentor\Reflection\Types\String_;
use cebe\markdown\GithubMarkdown;

class Post extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'title', 'content_filtered', 'content', 'slug',
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * @param $value
     */
    public function setContentFilteredAttribute($value)
    {
        $this->attributes['content_filtered'] = $value;
        $this->attributes['content'] = markdown($value);
    }
}
