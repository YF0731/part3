<?php

require_once  __DIR__ . '/PokerCard.php';
require_once  __DIR__ . '/PokerHandEvaluator.php';

class PokerGame
{
    public function __construct(
        private array $cards1,
        private array $cards2
    ) {
    }

    public function start(): array
    {
        $hands = [];
        foreach ([$this->cards1, $this->cards2] as $cards) {
            $pokerCards = array_map(fn ($card) => new PokerCard($card), $cards);
            $handEvaluator = new PokerHandEvaluator();
            $hands[] = $handEvaluator->getHand($pokerCards);
        }
        return $hands;
    }
}
