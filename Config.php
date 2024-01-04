<?php

namespace cdf;

/**
 * Contains app config
 */
class Config {

    static $DOCUMENT_ROOT = "public/";
    static $APP_NAME = "Content Delivery";
    static $db_config = [
            "host" => "localhost",
            "username" => "root",
            "password" => "",
            "db_name" => "",
        ];

    /**
     * Returns a new mysqli object using data from config.
     * Can be replaced with another kind of database connection.
     */
    static public function openDbConn(): \mysqli {
        return new \mysqli(self::$db_config["host"], self::$db_config["username"], self::$db_config["password"], self::$db_config["db_name"]);
    }

}