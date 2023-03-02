<?php
declare(strict_types=1);

namespace App\Actions\Game;

use App\Models\Game;

class GameAction
{
    public function handle(
        $gameHash,
        $userId
    ): void
    {
        Game::create([ //same as Game fillable
            'hash' => $gameHash,
            'user_id' => $userId,
            'target' => rand(1,10000),
        ]);
    }
}
