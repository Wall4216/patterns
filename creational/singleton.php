<?php
final class Connection
{
    private static ?self $instance = null;
    protected static string $name;
    public static function getName(): string
    {
        return self::$name;
    }

    /**
     * @param string $name
     */
    public static function setName(string $name): void
    {
        self::$name = $name;
    }
    public static function getInstance():self
    {
        if (self::$instance === null)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @return string
     */

    public function __clone(): void
    {
        // TODO: Implement __clone() method.
    }
    public function __wakeup(): void
    {
        // TODO: Implement __wakeup() method.
    }
}
$connection = Connection::getInstance();
$connection::setName('DataBase');
$connection2 = Connection::getInstance();
$connection2::setName('Laravel');
var_dump($connection2::getName());
