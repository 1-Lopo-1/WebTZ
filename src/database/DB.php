<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__DIR__, 2));
$dotenv->load();

class DB
{
    public $con = null;

    function getPassword() {
        return $_ENV['PASSWORD'];
    }

    function getConnection() {
        return $this->con;
    }

    function openConnection(): void
    {
        $this->con = mysqli_connect("localhost", "root", $this->getPassword(), "News", 3306)
            or die("Не удалось корректно подключиться к БД");
        $this->con->set_charset("utf8");
    }

    function closeConnection(): void
    {
        mysqli_close($this->con)
            or die("Не удалось закрыть соединение");
    }
}