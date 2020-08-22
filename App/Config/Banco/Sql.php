<?php
namespace App\Config\Banco;


class Sql extends Connection
{
    public function execSql($sql) 
    {
        $this->connect();
        $result = $this->connection->query($sql);
        return $result;
        $this->disconnect();
    }
}

