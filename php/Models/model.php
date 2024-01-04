<?php

namespace cdf\Models;

include_once("Config.php");

/**
 * Abstact class for all models containing 
 */
class Model {

    private static $dbConnOverride = null;

    function __construct($override = null) {
        $dbConnOverride = $override["dbConnOverride"];
        
        if ($dbConnOverride !== null) {
            try {
                self::$dbConnOverride = $dbConnOverride;
            } catch (\TypeError $e) {
                return ["status" => 500, "message" => $e->getMessage(), "stack_trace" => $e->getTraceAsString(), "rows" => []];
            }
        }
    }

    static function getResult($query, $params = null) {
        if (self::$dbConnOverride !== null) {
            $conn = \cdf\Config::openDbConn(self::$dbConnOverride);
        } else {
            $conn = \cdf\Config::openDbConn();
        }

        try {
            $query = $conn->prepare($query);
        } catch (\Exception $e) {
            return ["status" => 500, "message" => $e->getMessage(), "stack_trace" => $e->getTraceAsString(), "rows" => []];
        }
        
        if ($params != null && gettype($params) !== "array") {
            return ["status" => 500, "message" => "Parameters are not in an array."];
        }

        if ($params != null && gettype($params) === "array") {
            $literals = "";

            for ($index = 0; $index < count($params); $index++) {
                $literals .= "s";
            }

            $query->bind_param($literals, ...$params);
        }
        

        try {
            $query->execute();
        } catch (\Exception $e) {
            return ["status" => 500, "message" => $e->getMessage(), "stack_trace" => $e->getTraceAsString(), "rows" => []];
        }

        $result = $query->get_result();

        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        $conn->close();

        return ["status" => 200, "rows" => $rows];
    }

}