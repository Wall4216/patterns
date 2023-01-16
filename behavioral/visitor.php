<?php

interface WorkerVisitor
{
    public function visitDeveloper(Worker $worker);
    public function visitDesigner(Designer $designer);
}

class RecorderVisiter implements WorkerVisitor
{
    private array $visited = [];

    public function visitDeveloper(Worker $developer)
    {
        $this->visited = $developer;
    }

    public function visitDesigner(Designer $designer)
    {
        $this->visited = $designer;
    }

    /**
     * @return array
     */
    public function getWorkers(): array
    {
        return $this->visited;
    }
}
interface Worker
{
    public function work();
    public function accept(WorkerVisitor $visitor);

}

class Developer implements Worker
{
    public function work()
    {
        printf('developer is working');
    }
    public function accept(WorkerVisitor $visitor)
    {
        $visitor->visitDeveloper($this);
    }
}
class Designer implements Worker
{
    public function work()
    {
        printf('designer is working');
    }
    public function accept(WorkerVisitor $visitor)
    {
        $visitor->visitDesigner($this);
    }
}

$visitor = new RecorderVisiter();
$developer = new Developer();
$designer = new Designer();

$developer->accept($visitor);
$designer->accept($visitor);
var_dump($visitor->getWorkers());