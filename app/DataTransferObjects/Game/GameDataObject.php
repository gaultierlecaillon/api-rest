<?php
declare(strict_types=1);

namespace App\DataTransferObjects\Game;

class GameDataObject
{
    public function __construct(
        private readonly string $action
    )
    {
    }

    public function toArray(): array{
        return [
            'action'=> $this->action
        ];
    }
}
