<?php
session_start();
define('INDEX_DIR', __DIR__);

function autoload($className) {
    $classFileName = INDEX_DIR."/class/$className.class.php";
    if (is_file($classFileName)) {
        require_once($classFileName);
    }
}
spl_autoload_register("autoload");



include_once "class/DB.class.php";
include_once "config.php";
include_once "class/Comment.class.php";

$db = new DB($dbtype, $dbhost, $dbname, $dbuser, $dbpass);


$user = new User($db);

$user->user_name=htmlspecialchars($_POST['user_name']);
$user->user_password=htmlspecialchars($_POST['password']);
$user->login();

