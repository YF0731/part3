<?php

/**
 * 取得
 */
function getInput(): array
{
    $argument = array_slice($_SERVER['argv'], 1);
    return array_chunk($argument, 2);
}

/**
 * 取得したチャンネルごとの試聴時間をまとめる
 */
function groupChannelViewingPeriods(array $inputs)
{
    $channelViewingPeriods = [];
    foreach ($inputs as $input) {
        $chan = $input[0];
        $min = $input[1];
        $mins = [];
        array_push($mins, $min);

        if (array_key_exists($chan, $channelViewingPeriods)) {
            $mins = array_merge($channelViewingPeriods[$chan], $mins);
        }
        $channelViewingPeriods[$chan] = $mins;
    }
    return $channelViewingPeriods;
}

function calculateTotalHour(array $channelViewingPeriods): float
{
    $viewTimes = [];
    foreach ($channelViewingPeriods as $key => $period) {
        $viewTimes[$key] = array_sum($period);
    }
    return round(array_sum($viewTimes) / 60, 1);
}

function display($channelViewingPeriods)
{
    echo calculateTotalHour($channelViewingPeriods) . PHP_EOL;
    foreach ($channelViewingPeriods as $key => $value) {
        $num = count($value);
        $sum = array_sum($value);
        echo $key . ' ' . $sum . ' ' . $num . PHP_EOL;
    }
}

$inputs = getInput();
$channelViewingPeriods = groupChannelViewingPeriods($inputs);
display($channelViewingPeriods);
