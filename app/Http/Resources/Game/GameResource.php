<?php

namespace App\Http\Resources\Game;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'player' => UserResource::make($this->whenLoaded('user')) //only one user, so 'collection' => 'make'
        ];
    }
}
