<?php

// ◯お題
// あなたは小さなパン屋を営んでいました。一日の終りに売上の集計作業を行います。
// 商品は10種類あり、それぞれ金額は以下の通りです（税抜）。

// ①100
// ②120
// ③150
// ④250
// ⑤80
// ⑥120
// ⑦100
// ⑧180
// ⑨50
// ⑩300

// 一日の売上の合計（税込み）と、販売個数の最も多い商品番号と販売個数の最も少ない商品番号を求めてください。

// ◯インプット
// 入力は以下の形式で与えられます。

// 販売した商品番号 販売個数 販売した商品番号 販売個数 ...

// ※ただし、販売した商品番号は1〜10の整数とする。

// ◯アウトプット

// 売上の合計
// 販売個数の最も多い商品番号
// 販売個数の最も少ない商品番号

// ※ただし、税率は10%とする。
// ※また、販売個数の最も多い商品と販売個数の最も少ない商品について、販売個数が同数の商品が存在する場合、それら全ての商品番号を記載すること。

// ◯インプット例

// 1 10 2 3 5 1 7 5 10 1

// ◯アウトプット例

// 2464
// 1
// 5 10

// ◯実行コマンド例
// php quiz.php 1 10 2 3 5 1 7 5 10 1

// ○欲しいデータ構造
// $result = [
//     'num' => [quant, quant],
//     'num' => [quant, quant],
//     'num' => [quant, quant],
// ]

// インプットを取得
// 合計値を算出
// 最大値
// 最小値
// 表示

const SPLIT_LENGTH = 2;
const TAX = 10;
const BREADS = [
    1 => 100,
    2 => 120,
    3 => 150,
    4 => 250,
    5 => 80,
    6 => 120,
    7 => 100,
    8 => 180,
    9 => 50,
    10 => 300,
];

/**
 * 入力された値を取得
 *
 * @return array [商品番号 => 販売個数, 商品番号 => 販売個数,... ]
 */
function getInput(): array
{
    $argument = array_slice($_SERVER['argv'], 1);
    $args = array_chunk($argument, SPLIT_LENGTH);
    $sales = [];
    foreach ($args as $arg) {
        $sales[$arg[0]] = (int)$arg[1];
    }
    return $sales;
}

/**
 * 販売金額の合計値を算出
 */
function calculateSales(array $sales): int
{
    $num = 0;

    foreach ($sales as $number => $unitsSold) {
        $num += BREADS[$number] * (int)$unitsSold;
    }
    return (int)$num * (100 + TAX) / 100;
}

function getNumbersOfMaxUnitsSold(array $sales): array
{
    $max = max($sales);
    return array_keys($sales, $max);
}

function getNumbersOfMinUnitsSold(array $sales): array
{
    $min = min($sales);
    return array_keys($sales, $min);
}

function display(array ...$results): void
{
    foreach ($results as $result) {
        echo implode(' ', $result) . PHP_EOL;
    }
}

$sales = getInput();
$totalSales = calculateSales($sales);
$numberOfMaxUnitsSold = getNumbersOfMaxUnitsSold($sales);
$numberOfMinUnitsSold = getNumbersOfMinUnitsSold($sales);
display([$totalSales], $numberOfMaxUnitsSold, $numberOfMinUnitsSold);