<?php
define('INDEX_DIR', __DIR__);

/** class autoloader */
function autoload($className) {
    $classFileName = INDEX_DIR."/class/$className.class.php";
    if (is_file($classFileName)) require_once($classFileName);
}
spl_autoload_register("autoload");


/** database connection */
include_once('config.php');
$db = new DB($dbtype, $dbhost, $dbname, $dbuser, $dbpass);


/** install tables */

echo "Creates table 'comments'...";
$query = "
CREATE TABLE comments (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	create_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	user VARCHAR(255) NOT NULL,
	comment TEXT NOT NULL
);
";

$db->query($query);
echo "ok<br>";


echo "Inserts first comment...";
$query = "
INSERT INTO comments (user, comment) VALUES ('ja@com.pl', 'Pierwszy komentarz');
";
$db->query($query);
echo "ok<br>";


echo "Inserts second comment...";
$id = Comment::store($db, array(
	'user' => 'ty@com.pl',
	'comment' => 'Drugi komentarz'
));
echo "ok [$id] <br>";
print_r(Comment::load($db, $id));
