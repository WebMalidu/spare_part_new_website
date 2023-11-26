<?php
// access validator
require_once(__DIR__ . "/../backend/model/SessionManager.php");

$sessionManager = new SessionManager("alg006_admin");
if ($sessionManager->isLoggedIn()) {
    include_once(__DIR__ . "/dashboard.php");
} else {
    include_once(__DIR__ . "/signIn.php");
}
