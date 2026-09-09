<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    protected $table = 'breeds';

    protected $fillable = [
        'name',
    ];

    public function dogs()
    {
        return $this->hasMany(Dog::class);
    }
}
