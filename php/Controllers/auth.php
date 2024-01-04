<?php

namespace cdf\Controllers;

class Auth {
    
    function login() {
        session_start();

        $userDetails = (new \cdf\Models\Auth())->searchUser($_POST["email"]);

        if ($userDetails["status"] !== 200) {
            header("Location: login?e=nouser");
            return;
        }

        $_SESSION["user_type"] = $userDetails["type"];
        $_SESSION["first_name"] = $userDetails["first_name"];

        if ($_SESSION["user_type"] === "ADMIN") header("Location: admin-dashboard");
        else header("Location: dashboard");
    }

    function logout() {
        session_unset();
        session_destroy();
    }

}