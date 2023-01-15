<?php
class WorkerFacade
{
    private Developer $developer;
    private Designer $designer;

    /**
     * @param Developer $developer
     * @param Designer $designer
     */
    public function __construct(Developer $developer, Designer $designer)
    {
        $this->developer = $developer;
        $this->designer = $designer;
    }
    public function StartWork()
    {
        $this->developer->startDevelop();
        $this->designer->startDesigner();
    }
    public function StopWork()
    {
        $this->developer->stopDevelop();
        $this->designer->stopDesigner();
    }
}
class Developer
{
    public function startDevelop()
    {
        printf('start develop' . PHP_EOL);
    }
    public function stopDevelop()
    {
        printf('stop develop') . PHP_EOL;
    }

}
class Designer
{
    public function startDesigner()
    {
        printf('start designer' . PHP_EOL);
    }
    public function stopDesigner()
    {
        printf('stop designer' . PHP_EOL);
    }
}


$developer = new Developer();
$designer = new Designer();

$workerFacade = new WorkerFacade($developer, $designer);
$workerFacade->startWork();
$workerFacade->stopWork();