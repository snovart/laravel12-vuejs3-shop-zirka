<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';

    // Legacy table has no updated_at/created_at
    public $timestamps = false;

    protected $fillable = [
        'title',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
        ];
    }

    // Scope: published only
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    // Relation: a brand has many tovars
    public function tovars()
    {
        return $this->hasMany(Tovar::class, 'brand_id');
    }
}
