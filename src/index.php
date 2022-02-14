<?php

// class Scanner
// {
//     private $arr = [];
//     private $count = 0;
//     private $pointer = 0;
//     public function next()
//     {
//         if ($this->pointer >= $this->count) {
//             $str = trim(fgets(STDIN));
//             $this->arr = explode(' ', $str);
//             $this->count = count($this->arr);
//             $this->pointer = 0;
//         }
//         $result = $this->arr[$this->pointer];
//         $this->pointer++;
//         return $result;
//     }
//     public function hasNext()
//     {
//         return $this->pointer < $this->count;
//     }
//     public function nextInt()
//     {
//         return (int)$this->next();
//     }
//     public function nextDouble()
//     {
//         return (float)$this->next();
//     }
// }

// $sc = new Scanner();
// $first = [500, $sc->nextInt()]; // [500, 500] 3通り
// $second = [100, $sc->nextInt()]; // [100, 100] 3通り
// $third = [50, $sc->nextInt()]; // [50, 50] 3通り - 1
$result = 100;
$number = 0;

$tmp = [
    500 => 2,
    100 => 2,
    50 => 2,
];

foreach ($tmp as $key => $value) {
    if ($key === 100) {
        $number++;
    }
}

echo $number;
