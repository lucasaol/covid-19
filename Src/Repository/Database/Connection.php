<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

namespace App\Repository\Database;

use App\Repository\Database\Source\MysqliDb;

/**
 * Description of Connection
 *
 * @author lucas
 */
class Connection
{

    private static $conn;
    private string $host = DB_HOST;
    private string $user = DB_USER;
    private string $password = DB_PASS;
    private string $db = DB_NAME;

    public static function getInstance(): MysqliDb
    {
        if (!self::$conn instanceof MysqliDb) {
            $mysql = new Connection();
            self::$conn = $mysql->connect();
        }

        return self::$conn;
    }

    private function connect(): MysqliDb
    {
        try {
            $mysqli = new MysqliDb($this->host, $this->user, $this->password, $this->db);
            $mysqli->returnType = 'array';

            $mysqli->connect();
            return $mysqli;
        } catch (\Exception $ex) {
            throw new DatabaseException('Unable to connect MysqliDb.');
        }
    }

    private function disconnect(): void
    {
        try {
            $this->getConn()->disconnect();
            self::$conn = null;
        } catch (\Exception $ex) {
            throw new DatabaseException('Unable to disconnect MysqliDb.');
        }
    }

}
