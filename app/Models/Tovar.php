<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tovar extends Model
{
    use HasFactory;

    /**
     * Table name is "tovars" (matches migration).
     * No need to override $table.
     */

    /**
     * Disable auto timestamps because legacy table has only created_at.
     */
    public $timestamps = false;

    /**
     * Mass-assignable attributes.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'brand_id',
        'img',
        'video',
        'price',
        'descr',
        'is_published',
        'code',
        'material',
        'cnt',
        'created_at',
    ];

    /**
     * Attribute casting.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'price'        => 'integer',
            'material'     => 'integer',
            'cnt'          => 'integer',
            'created_at'   => 'datetime',
        ];
    }

    /**
     * Relation: belongs to Category (FK not enforced in DB, but logical link exists).
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Scopes
     */

    // Only published items
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    // Filter by category id (single id or array)
    public function scopeInCategory($query, $categoryIds)
    {
        $ids = is_array($categoryIds) ? $categoryIds : [$categoryIds];
        return $query->whereIn('category_id', $ids);
    }

    // Find by slug
    public function scopeBySlug($query, string $slug)
    {
        return $query->where('slug', $slug);
    }

    // Simple title search
    public function scopeSearchTitle($query, string $term)
    {
        return $query->where('title', 'like', '%'.$term.'%');
    }
}
