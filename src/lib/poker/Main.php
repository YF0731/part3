<?php

namespace Poker;

require_once 'PokerGame.php';

$pokerGame = new PokerGame(['CA', 'DA'], ['C9', 'H10']);

$pokerGame->start();
