<?php
class ControllerConfiguration
{
    private string $name;
    private string $action;

    /**
     * @param string $name
     * @param string $action
     */
    public function __construct(string $name, string $action)
    {
        $this->name = $name;
        $this->action = $action;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }
}

class Controller
{
    private ControllerConfiguration $controllerConfiguration;

    /**
     * @param ControllerConfiguration $controllerConfiguration
     */
    public function __construct(ControllerConfiguration $controllerConfiguration)
    {
        $this->controllerConfiguration = $controllerConfiguration;
    }
    public function getConfiguration():string
    {
        return $this->controllerConfiguration->getName() . '@' . $this->controllerConfiguration->getAction();
    }
}
$configuration = new ControllerConfiguration('PostController', 'index');
$controller = new Controller($configuration);
var_dump($controller->getConfiguration());