<?php

namespace Poker;

require_once  __DIR__ . '/PokerCard.php';
require_once  __DIR__ . '/PokerHandEvaluator.php';
require_once  __DIR__ . '/PokerTwoCardRule.php';
require_once  __DIR__ . '/PokerThreeCardRule.php';
require_once  __DIR__ . '/PokerFiveCardRule.php';

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
            $rule = $this->getRule($cards);
            $handEvaluator = new PokerHandEvaluator($rule);
            $hands[] = $handEvaluator->getHand($pokerCards);
        }
        return $hands;
    }

    private function getRule(array $cards): PokerRule
    {
        $rule = new PokerTwoCardRule();
        if (count($cards) === 3) {
            $rule = new PokerThreeCardRule();
        }
        if (count($cards) === 5) {
            $rule = new PokerFiveCardRule();
        }
        return $rule;
    }
}
