<?php
class BaseClass
{
	// Constructor
	function BaseClass() {
	}

	function Save()
	{
		$classname = get_class($this);
	
		$reflector = new ReflectionClass($classname); // get class name and get reflection of this class
		$arr = $reflector->getProperties(); // get an array of all the properties of the class	
		
		if (isset($this->id) == false) 
		{
			$sqlfields = "";
			$sqlvalues = "";
			$this->id = uuid();
			foreach($arr as $value){      // loop through properties
				$propname = $value->getName(); // get name of property
				if ($sqlfields != "") //first field
				{
					$sqlfields .= ",";
					$sqlvalues .= ",";
				}
				$sqlfields .= $propname;
				$sqlvalues .= "'".$this->$propname."'";
			} // end foreach
			
			$sql = "insert into ".$classname." (".$sqlfields.") values (".$sqlvalues.") ";
		}
		else
		{
                        $sqlfields = "";
			$sql = "update ".$classname." set ";
			foreach($arr as $value){      // loop through properties
				$propname = $value->getName(); // get name of property
				if (isset($this->$propname))
				{
					if ($sqlfields != "") //first field
						$sqlfields .= ",";
					$sqlfields .= $propname." = '".$this->$propname."' ";
				}
			} // end foreach
			
			// where
			$sql .= $sqlfields." where id = '".$this->id."'";
		}
		$connection = DB_OpenConnection();
		
		mysql_query($sql, $connection);
		DB_CloseConnection($connection);
		
		return $this->id;
	}

	function Load($myid)
	{
		$myObj = new $this;
		$classname = get_class($this);
		$sql = "select * from ".$classname." where id = '".$myid."'";
		$connection = DB_OpenConnection();
		$resultset = mysql_query($sql, $connection);
		
		$reflector = new ReflectionClass($classname); // get class name and get reflection of this class
		$arr = $reflector->getProperties(); // get an array of all the properties of the class
		
		while ($row = mysql_fetch_assoc($resultset)) 
		{
			foreach($arr as $value){      // loop through properties
				$propname = $value->getName(); // get name of property
				$myObj->$propname = $row[$propname];
			} // end foreach
		}
		DB_CloseConnection($connection);
		
		return $myObj;
	}

	function Delete()
	{
		$classname = get_class($this);
		$sql = "delete from ".$classname." where id = '".$this->id."'";
		$connection = DB_OpenConnection();
		mysql_query($sql, $connection);
		DB_CloseConnection($connection);
		return $this->id;
	}
}

?>
