<?php
interface State
{
    public function toNext( Task $task);
    public function getText();
}
class Task
{
    private State $state;

    /**
     * @return State
     */
    public function getState(): State
    {
        return $this->state;
    }

    /**
     * @param State $state
     */
    public function setState(State $state): void
    {
        $this->state = $state;
    }
    public static function make(): Task
    {
        $self = new self();
        $self->setState(new Created());
        return $self;
    }
    public function proceedToNext()
    {
        $this->state->toNext($this);
    }

}

class Created implements State
{

    public function toNext(Task $task)
    {
        $task->setState(new Process());
    }

    public function getText()
    {
        return 'Created';
    }
}
class Process implements State
{

    public function toNext(Task $task)
    {
        $task->setState(new Test());
    }

    public function getText()
    {
        return 'Text';
    }
}
class Test implements State
{

    public function toNext(Task $task)
    {
        $task->setState(new Done());
    }

    public function getText()
    {
        return 'Test';
    }
}
class Done implements State
{

    public function toNext(Task $task)
    {

    }

    public function getText()
    {
        return 'Done';
    }
}


$task = Task::make();
$task->proceedToNext();
var_dump($task->getState()->getText());