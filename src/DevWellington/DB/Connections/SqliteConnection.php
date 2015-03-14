<?php

namespace DevWellington\DB\Connections;

class SqliteConnection implements IConnection
{
    /**
     * @return \PDO
     */
    public static function getConnection()
    {
        return new \PDO("sqlite:".DBNAME);
    }

}
