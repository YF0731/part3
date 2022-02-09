<?php

class PokerCard
{
    private const CARD_RANK = [
        '2' => 1,
        '3' => 2,
        '4' => 3,
        '5' => 4,
        '6' => 5,
        '7' => 6,
        '8' => 7,
        '9' => 8,
        '10' => 9,
        'J' => 10,
        'Q' => 11,
        'K' => 12,
        'A' => 1
    ];

    public function __construct(
        private array $suitNumbers,
    ) {
    }

    public function getRank(): int
    {
        return self::CARD_RANK[substr($this->suitNumber, 1, strlen($this->suitNumber))];
    }

    public function getPair(): string
    {
        $suitNumber1 = self::CARD_RANK[$this->suitNumbers[0]]; // 13
        $suitNumber2 = self::CARD_RANK[$this->suitNumbers[1]]; // 13

        if ($suitNumber1 === $suitNumber2) {
            return 'pair';
        }

        if (abs($suitNumber1 - $suitNumber2) === 1 || abs($suitNumber1 - $suitNumber2) === 12) {
            return 'straight';
        }

        return 'high card';
    }
}
