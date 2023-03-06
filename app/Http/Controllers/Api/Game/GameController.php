<?php

namespace App\Http\Controllers\Api\Game;

use App\Actions\Game\GameAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\Game\GameResource;
use App\Models\Game;
use App\Responses\Game\GameCollectionResponse;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\DataTransferObjects\Game\GameDataObject;
use Illuminate\Support\Str;

class GameController extends Controller
{
    /**
     * Handle the incoming request /api/game/play
     */
    public function __invoke(Request $request)
    {
        /*
        dd($request);
        $gameDto = new GameDataObject(
            action: $request->action,
        );
        */
        $game_hash = Str::random(42);
        (new GameAction)->handle(
            $game_hash,
            $request->user()->id
        );

        return response()->json([
            'hash' => $game_hash
        ]);
    }

    /**
     * Create a new game
     */
    public function new(Request $request)
    {
        $game_hash = Str::random(42);

        (new GameAction)->handle(
            $game_hash,
            $request->user()->id
        );

        return response()->json([
            'hash' => $game_hash
        ]);
    }

    /**
     * Play a round
     */
    public function play(Request $request, $hash): JsonResponse
    {
        if (!Game::where('hash', $hash)->exists()) {
            return response()->json([
                'code' => -1,
                'message' => "This game doesn't exist"
            ]);
        }

        if (!Game::where('hash', $hash)->where('user_id', $request->user()->id)->exists()) {
            return response()->json([
                'code' => -4,
                'message' => "This game doesn't belong to you"
            ]);
        }

        $bet = $request->input('bet');
        if (!is_numeric($bet)){
            return response()->json([
                'code' => -2,
                'message' => "The guess value should be numeric"
            ]);
        }

        if ($bet <= 0 || 10000 < $bet){
            return response()->json([
                'code' => -3,
                'message' => "The guess value should be between 1 and 10000"
            ]);
        }

        return (new GameAction)->gameResult(
            $bet,
            $hash
        );


    }
}
