<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Category;

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class)
            ->withPivot('seq')->orderBy('pivot_seq');
    }


    /**
     * @param array $category_names
     * @return \Illuminate\Support\Collection
     */
    public function saveCategories($category_names)
    {
        $categories = collect();
        foreach ($category_names as $name) {
            $category = Category::where('name', $name)->first() ?: Category::create(['name' => $name, 'slug' => $name]);
            $categories->push($category);
        }
        $this->categories()->detach();
        for ($i = 0; $i < $categories->count(); $i++) {
            $this->categories()->attach($categories[$i], ['seq' => $i]);
        }
        return $categories;
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
