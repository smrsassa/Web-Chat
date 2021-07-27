<?php

namespace phpWebChat;

use PDO;

class Database
{
    private const HOST = '127.0.0.1';
    private const DB = 'webchat';
    private const USER = 'root';
    private const PASS = '';

    public $con;

    function __construct()
    {
        $this->con = new PDO(
            'mysql:host='.self::HOST.';dbname='.self::DB.';charset=utf8', self::USER, self::PASS 
        );
    }
   
}
