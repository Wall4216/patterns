<?php
interface Worker
{
    public function work();
}
class Programmer implements Worker
{
    public function work()
    {
        print('im programmer ');
    }
}
class Teacher implements Worker
{
    public function work()
    {
        print('im teacher ');
    }
}

interface WorkerFactory
{
    public static function make();
}
class ProgrammerFactory implements WorkerFactory
{
    public static function make()
    {
        return new Programmer();
    }
}
class TeacherFactory implements WorkerFactory
{
    public static function make()
    {
        return new Teacher();
    }
}
$programmer = ProgrammerFactory::make();
$teacher = TeacherFactory::make();
$teacher->work();
$programmer->work();
