<?php

$items = [
  ['name' => 'onion', 'price' => 100],
];
$total = 0;

foreach ($items as $item) {
  $price = $item['price'];
  $total += $price;
}

var_dump($total);
