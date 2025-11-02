<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavorite extends Model
{
    use HasFactory;

    /**
     * Table name.
     */
    protected $table = 'user_favorites';

    /**
     * No timestamps in legacy structure.
     */
    public $timestamps = false;

    /**
     * Mass-assignable attributes.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'tovar_id',
    ];

    /**
     * Relations.
     */

    // Favorite belongs to user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Favorite refers to product (tovar)
    public function tovar()
    {
        return $this->belongsTo(Tovar::class, 'tovar_id');
    }
}
