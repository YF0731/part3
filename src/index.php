<?php

// function main(int $A, int $B, int $C, int $x)
// {
//     $num = 0;
//     for ($a = 0; $a <= $A; $a++) {
//         for ($b = 0; $b <= $B; $b++) {
//             for ($c = 0; $c <= $C; $c++) {
//                 if ($a * 500 + $b * 100 + $c * 50 === $x) {
//                     $num++;
//                 }
//             }
//         }
//     }

//     return $num;
// }

// echo main(10, 10, 10, 2000);

// 部分和問題

function func(int $i, int $x, &$a): bool
{
    // ベースケース
    if ($i === 0) {
        if ($x === 0) {
            return true;
        } else {
            return false;
        }
    }

    if (func($i - 1, $x, $a)) {
        return true;
    }

    if (func($i - 1, $x - $a[$i - 1], $a)) {
        return true;
    }

    return false;
}

function main(): void
{
    $n = 5;
    $a = [3, 5, 1, 2, 9];
    $x = 8;
    if (func($n, $x, $a)) {
        echo 'Yes';
    } else {
        echo 'No';
    }
}

main();

?>
<script>
    const func = (i, x, a) => {
        // ベースケース
        if (i === 0) {
            if (x === 0) {
                return true;
            } else {
                return false;
            }
        }

        if (func(i - 1, x, a)) {
            return true;
        }

        if (func(i - 1, x - a[i - 1], a)) {
            return true;
        }

        return false;
    }

    const main = () => {
        let n = 5;
        let a = [3, 5, 1, 2, 9];
        let x = 8;
        if (func(n, x, a)) {
            console.log('Yes');
        } else {
            console.log('No');
        }
    }

    main();
</script>
