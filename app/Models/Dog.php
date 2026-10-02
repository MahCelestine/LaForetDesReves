<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Str;
use Carbon\Carbon;

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
        'is_external',
        'slug',
    ];

    protected $casts = [
        'LOF' => 'boolean',
        'retirement' => 'boolean',
        'is_external' => 'boolean',
        'birth_date' => 'date',
    ];

    protected static function booted(): void {
        static::saving(function ($dog) {
            if(empty($dog->slug)) {
                $dog->slug = Str::slug($dog->name_affix ?? $dog->common_name);
            }
        });
    }

    public function pictures(): MorphMany
    {
        return $this->morphMany(Picture::class, 'animal');
    }

    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }

    public function littersAsMom()
    {
        return $this->hasMany(Litter::class, 'mom_id');
    }

    public function littersAsDad()
    {
        return $this->hasMany(Litter::class, 'dad_id');
    }

    public function litters()
    {
        return $this->sex === 'male' ? $this->littersAsDad() : $this->littersAsMom();
    }
}
