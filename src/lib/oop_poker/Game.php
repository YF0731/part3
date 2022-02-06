<?php

require_once 'Player.php';
require_once 'Deck.php';

class Game
{
    public function __construct(
        private string $name,
        private int $drawNum
    ) {
    }

    function start(): array
    {
        $deck = new Deck();
        $player = new Player($this->name);
        $cards = $player->drawCards($deck, $this->drawNum);
        return $cards;
    }
}
