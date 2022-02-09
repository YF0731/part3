<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../lib/poker/PokerCard.php';

class PokerCardTest extends TestCase
{
    public function testGetPair()
    {
        $card = new PokerCard(['A', 'A']);
        $this->assertSame('pair', $card->getPair());
    }
}
