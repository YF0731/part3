<?php

function convertToNumber(string ...$cards): array
{
  return array_map(function ($card) {
    return substr($card, 1, strlen($card) - 1);
  }, $cards);
}

// print_r(convertToNumber('H3'));

$input_line = "Paiza";
$length = mb_strlen($input_line);
$lineLength = $length + 2;
$symbol = '';
for ($i = 1; $i < $lineLength; $i++) {
  $symbol .= '+';
}
$centerStr = '+' . $input_line . '+';

?>
<pre>
<?php
echo $symbol . '<br>';
echo $centerStr . PHP_EOL;
echo $symbol;
