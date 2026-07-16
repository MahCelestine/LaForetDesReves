<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Content extends Model
{
    protected $table = 'contents';

    protected $fillable = [
        'title',
        'extract',
        'content',
        'tiktok_path',
        'image_path',
        'category_id',
        'publication_date',
        'is_published',
    ];

    protected $casts = [
        'publication_date' => 'date',
        'is_published' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
