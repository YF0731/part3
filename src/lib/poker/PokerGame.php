<?php

require_once  __DIR__ . '/PokerCard.php';

class PokerGame
{
    public function __construct(
        private array $cards1,
        private array $cards2
    ) {
    }

    public function start(): array
    {
        $playerCardPair = [];
        foreach ([$this->cards1, $this->cards2] as $cards) {
            $pokerCards = new PokerCard(array_map(fn ($card) => substr($card, 1), $cards));
            $playerCardPair[] = $pokerCards->getPair();
        }
        return $playerCardPair;
    }
}
