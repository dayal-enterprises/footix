<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Player extends Model
{
    protected $fillable = [
        'team_id',
        'full_name',
        'age',
        'bib',
        'height',
        'weight',
        'position',
        'speed',
        'image',
    ];

    public function goals(): HasMany
    {
        return $this->hasMany(Goal::class);
    }
}