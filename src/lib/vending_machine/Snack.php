<?php

namespace VendingMachine;

require_once 'Item.php';

class Snack extends Item
{
    public function __construct()
    {
        parent::__construct('poteto chips');
    }

    public function getPrice(): int
    {
        return 150;
    }

    public function getCupNumber(): int
    {
        return 0;
    }
}
