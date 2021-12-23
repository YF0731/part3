<?php

class PokerGame
{
    private array $cards1;
    private array $cards2;
    public function __construct($cards1, $cards2)
    {
        $this->cards1 = $cards1;
        $this->cards2 = $cards2;
    }

    public function start(): array
    {
        return [$this->cards1, $this->cards2];
    }
}

$game = new PokerGame(['CA', 'DA'], ['C10', 'H10']);
var_dump($game->start());
