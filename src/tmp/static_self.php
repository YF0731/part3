<?php
class ParentClass
{
    public static function static_method()
    {
        echo 'in ParentClass' . '<br />';
    }

    public function parent_method()
    {
        static::static_method();
        self::static_method();
    }
}

class ChildClass extends ParentClass
{
    public static function static_method()
    {
        echo 'in ChildClass' . '<br />';
    }

    public function child_method()
    {
        static::static_method();
        self::static_method();
    }
}

$parent = new ParentClass();
$parent->parent_method();

$child = new ChildClass();
$child->parent_method();
