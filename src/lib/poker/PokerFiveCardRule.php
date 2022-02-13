<?php

namespace Poker;

require_once 'PokerCard.php';
require_once 'PokerRule.php';

class PokerFiveCardRule implements PokerRule
{
    private const HIGH_CARD = 'high card';
    private const OEN_PAIR = 'one pair';
    private const TWO_PAIR = 'two pair';
    private const THREE_OF_A_KIND = 'three of a kind';
    private const STRAIGHT = 'straight';
    private const FULL_HOUSE = 'full house';
    private const FOUR_OF_A_KIND = 'four of a kind';

    public function getHand(array $pokerCards): string
    {
        $cardRanks = array_map(fn ($pokerCard) => $pokerCard->getRank(), $pokerCards);
        $name = self::HIGH_CARD;

        if ($this->isFourOfAKind($cardRanks)) {
            return self::FOUR_OF_A_KIND;
        } elseif ($this->isFullHouse($cardRanks)) {
            $name = self::FULL_HOUSE;
        } elseif ($this->isStraight($cardRanks)) {
            $name = self::STRAIGHT;
        } elseif ($this->isThreeOfAKind($cardRanks)) {
            $name = self::THREE_OF_A_KIND;
        } elseif ($this->isTwoPair($cardRanks)) {
            $name = self::TWO_PAIR;
        } elseif ($this->isOnePair($cardRanks)) {
            $name = self::OEN_PAIR;
        }

        return $name;
    }

    private function isOnePair(array $cardRanks): bool // ['C2', 'D2', 'S3', 'H4', 'C5']
    {
        return count(array_unique($cardRanks)) === 4;
    }

    private function isTwoPair(array $cardRanks): bool // ['C2', 'D2', 'S3', 'H3', 'C5']
    {
        return count(array_unique($cardRanks)) === 3;
    }

    private function isThreeOfAKind(array $cardRanks): bool // ['C2', 'D2', 'S2', 'H4', 'C5']
    {
        return in_array(3, array_count_values($cardRanks));
        // [
        //     2 => 3,
        //     4 => 1,
        //     5 => 1,
        // ]
    }

    private function isStraight(array $cardRanks): bool
    {
        sort($cardRanks);
        return range($cardRanks[0], $cardRanks[0] + count($cardRanks) - 1) === $cardRanks || $this->isMinMax($cardRanks);
    }

    private function isMinMax(array $cardRanks): bool
    {
        return $cardRanks === [min(PokerCard::CARD_RANK), min(PokerCard::CARD_RANK) + 1, min(PokerCard::CARD_RANK) + 2, max(PokerCard::CARD_RANK)];
    }

    private function isFullHouse(array $cardRanks): bool // ['C2', 'D2', 'S2', 'H4', 'C4']
    {
        // [
        //     2 => 3,
        //     4 => 2,
        // ]
        return in_array(2, array_count_values($cardRanks)) && in_array(3, array_count_values($cardRanks));
    }

    private function isFourOfAKind(array $cardRanks): bool // ['C2', 'D2', 'S2', 'H2', 'C4']
    {
        // [
        //     2 => 4,
        //     4 => 1,
        // ]
        return in_array(4, array_count_values($cardRanks));
    }
}
