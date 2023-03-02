<?php

namespace App\Responses\Game;

use App\Http\Resources\Game\GameCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\LengthAwarePaginator;

class GameCollectionResponse implements \Illuminate\Contracts\Support\Responsable
{
    public function __construct(
        private readonly GameCollectionResponse|LengthAwarePaginator $collection,
        private readonly int        $status = 200,
    )
    {
    }

    /**
     * @inheritDoc
     */
    public function toResponse($request): JsonResponse
    {
        return response()->json(
            data: GameCollection::make(
                resource: $this->collection,
            )->response()->getData(),
            status: $this->status
        );
    }
}
