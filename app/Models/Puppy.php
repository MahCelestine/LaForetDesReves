<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Puppy extends Model
{
    protected $table = 'puppies';

    protected $fillable = [
        'litter_id',
        'mom_id',
        'dad_id',
        'name',
        'sex',
        'identification_number',
        'weight',
        'price',
        'color',
        'birth_date',
        'adoption_date',
        'breed_id',
        'description',
        'image_path',
        'status',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'adoption_date' => 'date',
        'price' => 'integer',
        'weight' => 'integer',
    ];

    public function litter(): BelongsTo
    {
        return $this->belongsTo(Litter::class);
    }

    public function pictures(): MorphMany
    {
        return $this->morphMany(Picture::class, 'animal');
    }

    public function breed(): BelongsTo
    {
        return $this->belongsTo(Breed::class);
    }
}
