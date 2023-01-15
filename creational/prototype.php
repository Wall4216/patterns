<?php
abstract class WorkerPrototype
{
    protected string $name;
    protected string $position;

    /**
     * @return string
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * @param string $position
     */
    public function setPosition(string $position): void
    {
        $this->position = $position;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}

class Developer extends WorkerPrototype
{
    protected string $position = 'Developer';
}
$developer = new Developer();
$developer2 = clone $developer;
$developer2->setName('Ilnaz');
var_dump($developer2->getName());