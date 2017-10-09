<?php

use sys\base\Config;
use sys\db\Connection;
use sys\http\Request;

/**
 * Created by PhpStorm.
 * User: alex1rap
 * Date: 09.10.2017
 * Time: 1:18
 */

class Sys
{
    public static $app;
    public $brand;
    public $config;
    public $db;
    public $language;
    public $request;

    /**
     * Sys constructor.
     * @param $config
     */
    public function __construct($config)
    {
        $dbConfig = include APP_ROOT . '/config/db.php';
        $this->config = new Config($config);
        $this->brand = $this->config->brand();
        $this->language = $this->config->language();
        $this->request = new Request();
        $this->db = new Connection($dbConfig);
        self::$app = $this;
    }

    /**
     * @param $obj
     * @param bool $is_array
     */
    public static function debug($obj, $is_array = false)
    {
        echo "<pre>";
        $is_array ? print_r($obj) : var_dump($obj);
        echo "</pre>";
    }
}

