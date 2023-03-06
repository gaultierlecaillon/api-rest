<?php

namespace App\Http\Controllers\Api\Game;

use App\Http\Controllers\Controller;
use App\Http\Resources\Game\GameCollection;
use App\Models\Game;
use App\Responses\Game\GameCollectionResponse;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     * @param Request $request
     * @return App\Responses\Game\GameCollectionResponse
     */
    public function __invoke(Request $request): GameCollectionResponse
    {
        return new GameCollectionResponse(
            collection: Game::query()
                ->with([
                    'user',
                ])
                ->where('user_id', $request->user()->id)
                ->paginate(25),
        );
    }
}
