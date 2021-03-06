<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var string[]|bool
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'publication_date' => 'datetime'
    ];

    /**
     * A post is belongs to an user
     *
     * @return BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get short description for the post
     *
     * @return string
     */
    public function getShortDescriptionAttribute()
    {
        if (strlen($this->description) < 120) {
            return $this->description;
        }

        return Str::limit($this->description, 120, '...');
    }

    /**
     * Posts filter scope
     * @return void
     */
    public function scopeFilterBy($query, array $filters)
    {
        $sort = $filters['sort'] ?? 'desc';
        $orderBy = $filters['orderBy'] ?? 'publication_date';

        $query->orderBy($orderBy, $sort);
    }
}
