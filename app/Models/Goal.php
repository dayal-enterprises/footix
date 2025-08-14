<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Goal extends Model
{
    protected $fillable = [
        'team_game_id',
        'player_id',
        'min',
        'sec',
        'type',
    ];

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }

    public function teamGame(): BelongsTo
    {
        return $this->belongsTo(TeamGame::class);
    }
}
