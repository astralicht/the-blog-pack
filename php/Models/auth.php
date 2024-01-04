<?php

namespace cdf\Models;

include_once("model.php");

class Auth {

    function searchUser($email) {
        $query = "SELECT * FROM users
                    WHERE `date_removed` IS NULL
                    AND `email`=?";

        $result = \cdf\Models\Model::getResult($query, $email);

        if ($result["status"] === 200) {
            // Enter code here
        }
    }

}