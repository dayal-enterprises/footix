<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'country',
        'city',
        'description',
        'creation_date',
    ];

    public function players(): HasMany
    {
        return $this->hasMany(Player::class);
    }

    public function teamGames(): HasMany
    {
        return $this->hasMany(TeamGame::class);
    }
}
