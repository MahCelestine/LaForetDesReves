<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Litter extends Model
{
    protected $table = 'litters';

    protected $fillable = [
        'mom_id',
        'dad_id',
        'birth_date',
        'number_puppies',
        'breed_id',
        'status',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'number_puppies' => 'integer',
    ];

    public function mom(): BelongsTo
    {
        return $this->belongsTo(Dog::class, 'mom_id');
    }


    public function dad(): BelongsTo
    {
        return $this->belongsTo(Dog::class, 'dad_id');
    }

    public function puppies(): HasMany
    {
        return $this->hasMany(Puppy::class, 'litter_id');
    }

    public function breed(): BelongsTo
    {
        return $this->belongsTo(Breed::class, 'breed_id');
    }
}
