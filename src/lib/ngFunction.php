<?php

/**
 * 使っていない変数がある
 * 引数の型が明記されていない
 * 返り値の型が明記されていない
 * 関数の名前にあいまいな動詞を使っている
 * マジックナンバーを使用している
 * 複数の処理をしている
 * 不正な値の場合の処理を書いていない。$rateが0の場合、0による除算のためエラーとなる。
 */
function handleData($input, $estimate, $rate, $screenX, $screenY)
{
    $estimatePrice = $estimate * 1.1 / $rate;
    updateDatabase($input);
    view($screenX);
    return $estimate;
}
