<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'title', 'image', 'storyline',
        'rating', 'language', 'release_date', 'director',
        'maturity_rating', 'running_time',
    ];

    protected $casts = [
        'release_date' => 'date',
        'running_time' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function shows()
    {
        return $this->hasMany(Show::class);
    }

    protected static $relations_to_cascade = ['shows'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($resource) {
            foreach (static::$relations_to_cascade as $relation) {
                foreach ($resource->{$relation}()->get() as $item) {
                    $item->delete();
                }
            }
        });
    }

    public function scopeFilter(Builder $query, array $filters)
    {
        $query->when($filters['search'] ?? false, function (Builder $query, $search_string) {
            $query->where('title', 'LIKE', '%' . $search_string . '%');
        });

        $query->when($filters['category'] ??  false, function (Builder $query, $category_code) {
            $query->whereRelation('category', 'title', $category_code);
        });

        $query->when($filters['sort'] ?? false, function (Builder $query, $sort) {
            if ($sort === 'top-rated') $query->orderBy('rating', 'desc');
            elseif ($sort === 'newest') $query->orderBy('release_date', 'desc');
            elseif ($sort === 'oldest') $query->orderBy('release_date', 'asc');
        });
    }
}
