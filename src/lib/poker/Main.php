<?php

require_once 'PokerGame.php';

$pokerGame = new PokerGame(['CA', 'DA'], ['C10', 'H10']);

echo '<pre>';
var_dump($pokerGame->start()); // [13, 13], [9, 9]
echo '</pre>';
