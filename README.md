'Lil Data Mapper

- PHP / MySQL data mapping framework

- Working example http://lildatamapper.blackcloudconcepts.com

- Links a PHP class structure to a MySQL table structure using class reflection.  Provides methods to save/insert, update, delete, and load objects from the database.

- index.php has sample code of how to interact with 'Lil Data Mapper
- conf.php is required in index.php and contains the database name, username, and password for MySQL.  $dbname, $dbusername, and $dbpassword should be defined there. 
- classes.php is where the classes (which coorespond to MySQL tables) are defined

For now it is necessary for the MySQL table to be created by hand to match the class defined.  For the purposes of this example you will need to create the following table.

CREATE TABLE `ldm_users` (
  `id` varchar(50) CHARACTER SET utf8 NOT NULL,
  `first_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `date_joined` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
