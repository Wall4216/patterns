<?php
interface Worker
{
    public function closedHours($hours);
    public function countSalary(): int;
}
class WorkerOutsource implements Worker
{
    private array $hours = [];
    public function closedHours($hours)
    {
        $this->hours[] = $hours;
    }
    public function countSalary(): int
    {
        return array_sum($this->hours)*500;
    }
}
class WorkerProxy extends WorkerOutsource
{
    private int $salary = 0;
    public function countSalary(): int
    {
       if ($this->salary === 0)
       {
           $this->salary = parent::countSalary();
       }
       return $this->salary;
    }
}
$workerProxy = new WorkerProxy();
$workerProxy->closedHours(50);
var_dump($workerProxy->countSalary());