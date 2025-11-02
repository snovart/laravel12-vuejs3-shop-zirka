<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Disable automatic timestamps because only created_at exists.
     */
    public $timestamps = false;

    /**
     * Mass-assignable fields.
     *
     * @var list<string>
     */
    protected $fillable = [
        'hsh',
        'user_id',
        'created_at',
        'status',
        'items',
        'uemail',
        'uname',
        'usurname',
        'uphone',
        'address',
        'totalsum',
        'totalcnt',
        'ttn',
        'ip',
    ];

    /**
     * Attribute casts.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'status'     => 'integer',
            'totalsum'   => 'integer',
            'totalcnt'   => 'integer',
        ];
    }

    /**
     * Relation: each order belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Scope: filter by status.
     */
    public function scopeByStatus($query, int $status)
    {
        return $query->where('status', $status);
    }
}
