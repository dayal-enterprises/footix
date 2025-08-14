<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    protected $fillable = [
        'date',
        'place',
        'status',
        'referee',
        'competition',
    ];

    public function teamGames(): HasMany
    {
        return $this->hasMany(TeamGame::class);
    }
}
