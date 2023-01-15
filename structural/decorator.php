<?php
interface Worker
{
   public function countSalary() : int;
}
abstract class WorkerDecorator implements Worker
{
    public Worker $worker;

    /**
     * @param Worker $worker
     */
    public function __construct(Worker $worker)
    {
        $this->worker = $worker;
    }

}
class Developer implements Worker
{
    public function countSalary(): int
    {
        return 20*3000;
    }
}
class DeveloperOverTime extends WorkerDecorator
{
    public function countSalary(): int
    {
        return $this->worker->countSalary() + $this->worker->countSalary()*0.6;
    }
}
$developer = new Developer();
$developerOverTime = new DeveloperOverTime($developer);
var_dump($developer->countSalary());
var_dump($developerOverTime->countSalary());