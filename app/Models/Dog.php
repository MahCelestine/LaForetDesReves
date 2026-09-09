<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Dog extends Model
{
    protected $table = 'dogs';

    protected $fillable = [
        'name_affix',
        'common_name',
        'sex',
        'identification_number',
        'LOF',
        'cotation',
        'color',
        'birth_date',
        'breed_id',
        'retirement',
        'description',
        'image_path',
    ];

    protected $casts = [
        'LOF' => 'boolean',
        'retirement' => 'boolean',
        'birth_date' => 'date',
    ];

    public function pictures(): MorphMany
    {
        return $this->morphMany(Picture::class, 'animal');
    }

    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }
}
