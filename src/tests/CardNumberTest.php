<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../lib/CardNumber.php');

class CardNumberTest extends TestCase
{
  public function testShowDown()
  {
    $this->assertSame(['7'], convertToNumber('C7'));
    $this->assertSame(['3', '10', 'A'], convertToNumber('H3', 'S10', 'DA'));
  }
}
