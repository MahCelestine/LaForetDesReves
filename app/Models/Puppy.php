<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Str;
use Carbon\Carbon;

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
        'slug',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'adoption_date' => 'date',
        'price' => 'integer',
        'weight' => 'integer',
    ];

    protected static function booted(): void
    {
        static::saving(function ($puppy) {
            if (empty($puppy->slug) || $puppy->isDirty(['name', 'birth_date'])) {
                $baseSlug = Str::slug($puppy->name);

                if ($puppy->birth_date) {
                    $formattedDate = Carbon::parse($puppy->birth_date)->format('d-m-Y');
                    $baseSlug .= '-' . $formattedDate;
                }

                $count = Puppy::where('slug', 'LIKE', "{$baseSlug}%")
                    ->where('id', '!=', $puppy->id)
                    ->count();

                $puppy->slug = $count ? "{$baseSlug}-{$count}" : $baseSlug;
            }
        });
    }

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
