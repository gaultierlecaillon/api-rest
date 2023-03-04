<?php
declare(strict_types=1);

namespace App\Actions\Game;

use App\Models\Game;
use Illuminate\Http\JsonResponse;

class GameAction
{
    public function handle(
        $gameHash,
        $userId
    ): void
    {
        //same field as Game fillable
        Game::create([
            'hash' => $gameHash,
            'user_id' => $userId,
            'target' => rand(1, 10000),
            'try' => 0,
        ]);
    }

    public function greater(
        $bet
    ): JsonResponse
    {
        return response()->json([
            'code' => 0,
            'error' => "Greater than" . $bet
        ]);
    }

    public function gameResult($bet, $hash): JsonResponse
    {
        $game = Game::where('hash', $hash)->firstOrFail();
        $target = $game->target;
        $game->increment('try');
        $game->update(['game_end_at' => now()]);


        // Greater than
        if ($bet < $target) {
            return $this->greaterThan($bet);
        }
        // Less than
        elseif ($bet > $target) {
            return $this->lessThan($bet);
        }

        // Win
        return $this->win($bet);
    }

    public function greaterThan(
        $bet
    ): JsonResponse
    {
        return response()->json([
            'code' => 0,
            'message' => "Greater than " . $bet
        ]);
    }

    public function lessThan($bet): JsonResponse
    {
        return response()->json([
            'code' => 0,
            'message' => "Less than " . $bet
        ]);
    }

    public function win($bet): JsonResponse
    {
        return response()->json([
            'code' => 1,
            'message' => "You Won ! $bet is a match"
        ]);
    }
}
