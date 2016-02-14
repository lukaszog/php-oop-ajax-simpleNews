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
$query = "CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `news_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";
$query2= "
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` datetime NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `user` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";
$query3 = "
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(25) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `joining_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";

$db->query($query);
$db->query($query2);
$db->query($query3);
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
