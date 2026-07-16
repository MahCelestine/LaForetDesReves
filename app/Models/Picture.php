<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Picture extends Model
{
    protected $table = 'pictures';

    protected $fillable = [
        'animal_id',
        'animal_type',
        'image_path',
    ];

    public function animal(): MorphTo
    {
        return $this->morphTo();
    }
}
