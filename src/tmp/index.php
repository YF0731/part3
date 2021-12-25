<?php

// 1
$str = 'PHPはPHP:Hypertext Preprocessorの略です';
echo mb_strrpos($str, 'PHP') . '文字目';

// 2
printf('%sの気温は%.1f℃です。 ', '弘前', 15.156);

// 3
$str = 'wings knowledge';
echo mb_convert_case($str, MB_CASE_TITLE);

// 4
$str = 'ボクの名前はリオです';
$str = str_replace(['ボク', 'リオ'], ['私', '凛生'], $str);
echo $str;

// 5
$str = 'https://wings.msn.to/';
var_dump(str_starts_with($str, 'http'));


//
$data = ['高江', '青木', '片渕'];

// 1
$data[] = '山田';
$data[] = '日尾';
// print_r($data);

// 2
array_unshift($data, '掛谷');
array_unshift($data, '土井');
print_r($data);

// 3
print_r(array_slice($data, 3, 3));


// 4
// 1

$num = 12.2;
echo ceil($num);

$num2 = -12;
echo abs($num2);

$x = 'こんにちは';
echo $x;
unset($x);

echo $x;
