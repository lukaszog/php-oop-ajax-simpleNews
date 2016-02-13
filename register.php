<?php
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

$user->user_email=htmlspecialchars($_POST['user_email']);
$user->user_name=htmlspecialchars($_POST['user_name']);
$user->user_password=md5(htmlspecialchars($_POST['password']));

$user->create();
