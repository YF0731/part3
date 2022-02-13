<?php

$in1 = [
    'a' => 1,
    'b' => 2,
    'c' => 3,
    'd' => 4,
];

$in2 = 99;

//////////////////////////////////
//       SOME CODE HERE         //
//////////////////////////////////

$in1['id'] = $in2;
$out2 = array_combine(array_map(fn ($key) => ':' . $key, array_keys($in1)), array_values($in1));

$set = implode(', ', array_map(fn ($key) => "{$key} = :{$key}", array_keys($in1)));

$out1 = "UPDATE tbl SET {$set} WHERE id = :id";

var_dump($out1, $out2);

/*
string 'UPDATE tbl SET a = :a, b = :b, c = :c, d = :d WHERE id = :id' (length=60)

array (size=5)
  ':a' => int 1
  ':b' => int 2
  ':c' => int 3
  ':d' => int 4
  ':id' => int 99
*/
