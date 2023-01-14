<?php
interface AbstractFactory
{
    public static function makeDeveloperWorker(): DeveloperWorker;
    public static function makeDesignerWorker(): DesignerWorker;
}
class OutsourceWorkerFactory implements AbstractFactory
{
    public static function  makeDesignerWorker(): DesignerWorker
    {
        return new OutsourceDesignerWorker();
    }
    public static function makeDeveloperWorker(): DeveloperWorker
    {
        return new OutsourceDeveloperWorker();
    }
}


class NativeWorkerFactory implements AbstractFactory
{
    public static function makeDesignerWorker(): DesignerWorker
    {
        return new NativeDesignerWorker();
    }
    public static function makeDeveloperWorker(): DeveloperWorker
    {
        return new NativeDeveloperWorker();
    }

}
interface Worker
{
    public function work();
}
interface DeveloperWorker extends Worker
{

}
interface DesignerWorker extends Worker
{

}
class NativeDeveloperWorker implements DeveloperWorker
{
    public function work()
    {
        printf('native p ');
    }
}
class OutsourceDeveloperWorker implements DeveloperWorker
{
    public function work()
    {
        printf('outsource p ');
    }
}
class NativeDesignerWorker implements DesignerWorker
{
    public function work()
    {
        printf('native d ');
    }
}
class OutsourceDesignerWorker implements DesignerWorker
{
    public function work()
    {
        printf('outsource d ');
    }
}


$nativeDeveloper = NativeWorkerFactory::makeDeveloperWorker();
$nativeDesigner = NativeWorkerFactory::makeDesignerWorker();
$outsourceDeveloper = OutsourceWorkerFactory::makeDeveloperWorker();
$outsourceDesigner = OutsourceWorkerFactory::makeDesignerWorker();
$nativeDeveloper->work();
$nativeDesigner->work();
$outsourceDesigner->work();
$outsourceDeveloper->work();