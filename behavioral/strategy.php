<?php
interface Definer
{
    public function define($arg);
}
class Data
{
    private Definer $definer;
    private int|string|bool $arg;
    /**
     * @param Definer $definer
     */
    public function __construct(Definer $definer)
    {
        $this->definer = $definer;
    }
    public function executeStrategy(): string
    {
       return $this->definer->define($this->arg);
    }

    /**
     * @return bool|int|string
     */
    public function getArg(): bool|int|string
    {
        return $this->arg;
    }

    /**
     * @param bool|int|string $arg
     */
    public function setArg(bool|int|string $arg): void
    {
        $this->arg = $arg;
    }
}
class IntDefiner implements Definer
{

    public function define($arg)
    {
        return $arg . ' from int strategy';
    }
}
class BoolDefiner implements Definer
{

    public function define($arg): bool
    {
        return $arg . ' from bool strategy';
    }
}
class StringDefiner implements Definer
{

    public function define($arg): string
    {
        return $arg . ' from string strategy';
    }
}

$data = new Data(new IntDefiner());

$data ->setArg('soieghbihebie');
var_dump($data->executeStrategy());