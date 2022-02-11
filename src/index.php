<?php

class Person
{
    public function __construct(
        protected string $firstName,
        protected string $lastName
    ) {
    }

    public function show(): void
    {
        echo "<p>僕の名前は{$this->lastName}{$this->firstName}です</p>";
    }
}

class BusinessPerson extends Person
{
    public function work(): void
    {
        echo "{$this->lastName}{$this->firstName}は働いています。";
    }
}

class HetareBusinessPerson extends BusinessPerson
{
    public function work(): void
    {
        parent::work();
        echo 'ただし、ボチボチと...';
    }
}

class Foreigner extends Person
{
    public function __construct(
        public string $firstName,
        public string $middleName,
        public string $lastName
    ) {
        parent::__construct($firstName, $lastName);
    }

    public function show(): void
    {
        echo "<p>僕の名前は{$this->firstName}.{$this->middleName}.{$this->lastName}です";
    }
}

// (new HetareBusinessPerson('藤田', '泰史'))->work();

class FileLogger
{
    private DateTime $current;
    private SplFileObject $file;

    public function __construct(
        private string $logName
    ) {
        $this->current = new DateTime();
        $this->file = new SplFileObject("{$logName}-{$this->current->format('Ymd')}.log", 'a');
    }

    public function fwrite(string $str)
    {
        $this->file->fwrite("[{$this->current->format('Y/m/d')}]{$str}\n");
    }
}

// $logger = new FileLogger('log');
// $logger->fwrite('HogeHoge Text');

// $splFile = new FileLogger('log');
// $splFile->fwrite('HogeHoge Text');
// $splFile->fread(10);

class MyParent
{
    public static function show()
    {
        echo __CLASS__;
    }

    public static function staticTest()
    {
        static::show();
    }
}

class MyChild extends MyParent
{
    public static function show()
    {
        echo __CLASS__;
    }
}

// MyChild::staticTest();

/**
 * 子クラス
 * extends
 * 親クラス
 */

class MyClass
{
    public function __construct(
        protected string $data,
    ) {
    }

    public function getData(): string
    {
        return $this->data;
    }
}

class SubClass extends MyClass
{
    public function getData(): string
    {
        return '[' . parent::getData() . ']';
    }
}

echo (new SubClass('あああ'))->getData();
