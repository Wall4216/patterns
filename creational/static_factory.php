<?php
interface Worker
{
    public function work();
}
class Programmer implements Worker
{
    public function work()
    {
        printf('im programmer ');
    }
}
class Teacher implements Worker
{
    public function work()
    {
        printf('im teacher ');
    }
}

class WorkerFactory
{
    public static function make($workerTitle): ?Worker
    {
        $Сlassname = strtoupper($workerTitle);
        if(class_exists($Сlassname))
        {
            return new $Сlassname();
        }
        return null;
    }
}

$developer = WorkerFactory::make('Programmer');
$developer->work();