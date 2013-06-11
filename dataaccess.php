<?php
function DB_OpenConnection()
{
	global $dbusername;
	global $dbpassword;
	global $dbname;
	$connection = mysql_connect('localhost', $dbusername, $dbpassword);
   	if (!$connection) 
   	{
      		die('Could not connect: ' . mysql_error());
   	}

	// Connect to DB
	if (!mysql_select_db($dbname, $connection))
	{
		echo 'Could not select database';
		exit;
	}

   	return $connection;
}

function DB_CloseConnection($connection)
{
   	mysql_close($connection);
}

function CheckResultSet($resultset)
{
  	if (!$resultset) 
  	{
    		echo "DB Error, could not query the database\n";
    		echo 'MySQL Error: ' . mysql_error();
    		exit;
  	}
}
?>
