<?php

interface Command
{
    public function execute();
}
interface Updatable extends Command
{
    public function undo();
}
class Output
{
    private bool $isEnable = true;

    private string $body = 'Ничего нету';

    public function enable()
    {
        $this->isEnable = true;
    }
    public function disable()
    {
        $this->isEnable = false;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    public function write($str)
    {
        if ($this->isEnable)
        {
            $this->body = $str;
        }
    }
}

class Invoker
{
    private Command $command;

    /**
     * @param Command $command
     */

    public function run(): Command
    {
        return $this->command->execute();
    }

    /**
     * @param Command $command
     */
    public function setCommand(Command $command): void
    {
        $this->command = $command;
    }


}

class Message implements Command
{
    private Output $output;

    /**
     * @param Output $output
     */
    public function __construct(Output $output)
    {
        $this->output = $output;
    }


    public function execute()
    {
        $this->output->write('Hello');
    }

}

class ChangerStatus implements Updatable
{
    private Output $output;

    /**
     * @param Output $output
     */
    public function __construct(Output $output)
    {
        $this->output = $output;
    }

    public function execute()
    {
        $this->output->enable();
    }

    public function undo()
    {
        $this->output->disable();
    }
}

$output = new Output();

$invoker = new Invoker();

$message = new Message($output);
$changerStatus = new ChangerStatus($output);
$changerStatus->undo();
$changerStatus->execute();
$message->execute();
var_dump($output->getBody());