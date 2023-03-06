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
        $game->increment('try');

        // Greater than
        if ($bet < $game->target) {
            return $this->greaterThan($bet, $game);
        } // Less than
        elseif ($bet > $game->target) {
            return $this->lessThan($bet, $game);
        }

        // Win
        $game->update(['game_end_at' => now()]);
        return $this->win($bet, $game);
    }

    public function greaterThan($bet, $game): JsonResponse
    {
        return response()->json([
            'code' => 0,
            'hash' => $game->hash,
            'try' => $game->try,
            'target' => $game->target,
            'started_at' => $game->created_at,
            'message' => "The number is greater than " . $bet
        ]);
    }

    public function lessThan($bet, $game): JsonResponse
    {
        return response()->json([
            'code' => 0,
            'hash' => $game->hash,
            'try' => $game->try,
            'target' => $game->target,
            'started_at' => $game->created_at,
            'message' => "The number is less than " . $bet
        ]);
    }

    public function win($bet, $game): JsonResponse
    {
        return response()->json([
            'code' => 1,
            'hash' => $game->hash,
            'try' => $game->try,
            'target' => $game->target,
            'started_at' => $game->created_at,
            'message' => "Congratulation, you won ! $bet is a match"
        ]);
    }
}
