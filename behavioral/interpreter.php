<?php

abstract class Expression
{
    abstract public function interpret(Context $context);
}

class Context
{
    private array $worker = [];

    /**
     * @param array $worker
     */
    public function setWorker(string $worker): void
    {
        $this->worker[] = $worker;
    }
    public function lookUp($key): string|bool
    {
        if(isset($this->worker[$key]))
        {
            return $this->worker[$key];
        }
        return false;
    }
}

class VariableExp extends Expression
{
    private int $key;

    /**
     * @param int $key
     */
    public function __construct(int $key)
    {
        $this->key = $key;
    }

    public function interpret(Context $context):bool
    {
        return $context->lookUp($this->key);
    }
}
class AndExp extends Expression
{
    private int $keyOne;
    private int $keyTwo;

    /**
     * @param int $keyOne
     * @param int $keyTwo
     */
    public function __construct(int $keyOne, int $keyTwo)
    {
        $this->keyOne = $keyOne;
        $this->keyTwo = $keyTwo;
    }

    public function interpret(Context $context): bool
    {
        return $context->lookUp($this->keyOne)&& $context->lookUp($this->keyTwo);
    }
}
class OrExp
{
    private int $keyOne;
    private int $keyTwo;

    /**
     * @param int $keyOne
     * @param int $keyTwo
     */
    public function __construct(int $keyOne, int $keyTwo)
    {
        $this->keyOne = $keyOne;
        $this->keyTwo = $keyTwo;
    }

    public function interpret(Context $context): bool
    {
        return $context->lookUp($this->keyOne) || $context->lookUp($this->keyTwo);
    }
}
$context = new Context();
$context->setWorker('Ilnaz');
$context->setWorker('Xan');
$varExp = new VariableExp(0);
$andExp = new AndExp(1, 2);
$orExp = new OrExp(1, 2);
var_dump($varExp->interpret($context));
var_dump($andExp->interpret($context));
var_dump($orExp->interpret($context));