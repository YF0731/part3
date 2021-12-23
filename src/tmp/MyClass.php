<?php

class MyClass
{
    public int $width;
    public int $height;

    public static function square(int $width, int $height): int
    {
        return $width * $height / 2;
    }
}

$result = MyClass::square(100, 150);
echo $result;
