<?php
interface Mediator
{
    public function getWorker();
}
abstract class Worker
{
    private string $name;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function sayHello()
    {
        printf('Hello');
    }
    public function work():string
    {
        return $this->name . ' is working';
    }
}
class InfoBase
{
    public function printInfo(Worker $worker)
    {
        printf($worker->work());
    }
}
class WorkerInfobaseMediator implements Mediator
{
    private Worker $worker;
    private InfoBase $infoBase;

    /**
     * @param Worker $worker
     * @param InfoBase $infoBase
     */
    public function __construct(Worker $worker, InfoBase $infoBase)
    {
        $this->worker = $worker;
        $this->infoBase = $infoBase;
    }

    public function getWorker()
    {
        $this->infoBase->printInfo($this->worker);
    }

}

class Developer extends Worker
{

}
$developer = new Developer('Ilnaz');
$infoBase = new InfoBase();
$workerInfoBaseMediator = new WorkerInfobaseMediator($developer, $infoBase);
$workerInfoBaseMediator->getWorker();