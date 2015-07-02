
<?php 
class Database
{              
	private $host='';
	private $user='';
	private $password='';
	private $database='';
	private $condb="";
	//private $condb = new mysqli($this->host,$this->user,$this->password,$this->database);

	function __construct($host,$user,$password,$database)
	{
		

		$this->host=$host;
		$this->user=$user;
		$this->password=$password;
		$this->database=$database;

		$this->connect();	
	}

	// Database creation 
	public function createdb($name)
	{
		if ($name==!null)
		{
			$create="CREATE DATABASE ".$name;
			
		}
		mysqli_query($this->condb,$create) or die(mysqli_error());
	}

	// Delete database
	public function deletedb($dbname)
	{
		if ($dbname==!null)
		{
			$delete="DROP DATABASE `".$dbname."`";
		}
		mysqli_query($this->condb,$delete) or die(mysqli_error());
	}

	// database connection
	public function connect()
	{
		$this->condb = new mysqli($this->host,$this->user,$this->password,$this->database);

		
		if($this->condb->connect_error)
		{
			die('conect error('.$this->condb->connect_errno.')'.$this->condb->connect_errno);

		}
		else
		{
			//echo "connection success from function";	
		}
	}

	//Database disconnect
	public function disconnect()
	{
		mysqli_close($this->condb);
	}

	//create table
	public function create_table($table,$attributes)
	{
		$attributes=implode(",", $attributes);
		$create="CREATE TABLE ".$table." (".$attributes.")";
		$query=mysqli_query($this->condb,$create);
		if ($query===FALSE) 
		{
			return trigger_error($this->condb->error);
		}
		var_dump($create);
	}

	// delete table
	public function delete_table($table_name)
	{
		if ($table_name!=null) 
		{
			$delete="DROP TABLE ".$table_name;
			$query=mysqli_query($this->condb,$delete);
			if ($query==FALSE) 
			{
				return trigger_error($this->condb->error);
			}
		}

	}

	// alter table
	public function alter_table($table_name,$add_colomn,$modify,$delete_colomn)
	{
		$alter="ALTER TABLE ".$table_name;
		if ($add_colomn!=null) 
		{
			$alter.=" ADD ".$add_colomn[0]." ".$add_colomn[1];
		}
		elseif ($modify!=NULL) 
		{
			$alter=" MODIFY COLUMN ".$modify;
		}
		elseif ($delete_colomn!=null) 
		{
			$alter.=" DROP COLUMN ".$delete_colomn;
		}
		// var_dump($alter);
		$query=mysqli_query($this->condb,$alter);
		if ($query==FALSE) 
		{
			return trigger_error($this->condb->error);
		}
	}


	// Data insert
	public function insert($table,$fields,$values)
	{
	
		$insert="INSERT INTO ".$table;
		if ($fields!=null)
		{
			// echo var_dump($fields);
			$fields='`'.implode('`, `', $fields).'`';
			$insert .= " (".$fields.")"; 
				// echo $fields;
		}
		$value=str_repeat("?,", count($values)-1).'?';
		$value_type="";
		for ($i=0; $i <count($values) ; $i++)
		{ 
			if (is_string($values[$i]))
			{
				$value_type.="s";
			}
			else
			{

				$value_type.="i";
			}		
		}
		$insert.="VALUES(".$value.")";
		$stmt=$this->condb->prepare($insert);
		$params[0] =  &$value_type;
		foreach ($values as $key => $value) {
			// array_push($params,&$values[$key]);
			$params[$key+1] = &$values[$key];
		}
		// var_dump($insert);
		call_user_func_array(array(&$stmt ,'bind_param'), $params);
		// $stmt->bind_param($value_type,$values[0],$values[1]);
		// $stmt->bind_param($value_type,{$values[]});
		$stmt->execute();
		if ($stmt===FALSE)	
		 {
			trigger_error("error");
		 }
		 else
		 	return true;

		 

	}

	//select data
	public function select($table,$fields,$where)
	{
		$count=count($fields);
		$fields=implode(',',$fields);
		$select="SELECT ";
		if ($fields==null)
		{
			$select.="* FROM ".$table;
		}
		else
		{
			$select.=$fields." FROM ".$table;
		}
		
		if($where != null)
		{
			$select.=" WHERE ".$where[0]." = ".$where[1];
			if (is_string($where[1]))
			{
			 $select.="'".$where[1]."'";
			}
		}
		// var_dump($select);
		$query=mysqli_query($this->condb,$select);
		
		if ($query===FALSE)
			return trigger_error($this->condb->error);
		
		
		
		$recset = array();

		while ($rec=mysqli_fetch_array($query))
			array_push($recset, $rec);
		return $recset;
	}




	public function select_row_emp($id)
	{	
		
		$select="SELECT address.name,address.fb,address.linkedin,files.file_name,files.type FROM employee JOIN address ON employee.id=address.id join files ON files.id=employee.id where employee.id=".$id;
		// var_dump($select);
		$query=mysqli_query($this->condb,$select);
		if ($query==FALSE) 
		
			return trigger_error($this->condb->error);
		
		$recset=array();
		while ($rec=mysqli_fetch_array($query))
			return $rec;
			
	}

	public function select_row_cmp()
	{
		$select="SELECT company_details.no_holidays,company_details.open_time,company_details.close_time,address.name,address.address,address.email,address.telephone,address.mobile,address.website,address.linkedin,address.fb,address.twiter,address.google_plus FROM company_details join address ON company_details.id=address.id";
		// var_dump($select);
		$query=mysqli_query($this->condb,$select);
		if ($query==FALSE) 
			return trigger_error($this->condb->error);
		$recset=array();
		while ($rec=mysqli_fetch_array($query)) 
			return $rec;
	}
	

	//delete the data

	public function delete($table,$fields)
	{
		$fields=implode(',', $fields);
		$delete="DELETE FROM ".$table;
		echo $delete;
		$query=mysqli_query($this->condb,$delete) or die(mysqli_error());
	}
//	update data
	
	public function update($table,$fields,$new_values,$where)
	{	
		if (count($fields)==count($new_values)) 
		{
			$update="UPDATE ".$table." SET ";
			// $count=count($fields);
			// for ($i=0; $i < $count; $i++)
			foreach ($fields as $value) 
			{				
				$update.=$fields[$i]." = ?";
				if($i != $count -1)
					$update.=' , ';
			}
			
			$update.=" WHERE id=".$where;
//			$where=117;
			$type_value=str_repeat("s",count($fields));
			$stmt=$this->condb->prepare($update);
			if($stmt===FALSE)
			{
				trigger_error($this->condb->error);
				return(FALSE);
			}

			//normal binding
			//$stmt->bind_param($type_value,$new_values[0],$new_values[1]);

			//dynamic binding
			$params[0]=&$type_value;
			foreach ($new_values as $key => $value)
			{
			$params[$key+1]=&$new_values[$key];
			}
			call_user_func_array(array(&$stmt,'bind_param'),$params);
			$stmt->execute();
			if ($stmt===FALSE)
			{
				trigger_error($this->condb->error);
				return(FALSE);		
			}			
		}
	}

	public function num_row()
	{
		$count="SELECT * FROM employee";
		$query=mysqli_query($this->condb,$count);
		$count=mysqli_num_rows($query);
		return $count;
	}


}


// $obj= new Database('localhost','root','asd','test');

// $name="thengakola";
// $obj->createdb($name);

// $obj->deletedb($name);

// $table_name="gruop";
// $primary="id";
// $attributes=array("id integer(10) primary key","userid integer(10)");
// $obj->create_table($table_name,$attributes);

// $obj->delete_table($table_name);         

// $delete_colomn="";
// $modify="";
// $add_colomn="name varchar(25)";
// $obj->alter_table($table_name,$add_colomn,$modify,$delete_colomn);   

// $fields=array("username","password","email");
// $values=array("sanoop","sanu","sanoop@gmail.com");
// $obj->insert("users",$fields,$values);

// $fields=array("username","password","email","name");
// $fields=array("");
// $where=array("name","noushid");
// $result = $obj->select("users",$fields,$where);
// var_dump($result);

// $obj->delete("users",array("username"));

// $fields=array("name");
// $values=array("");
// $where=5;
// $new_values=array("sanoopa"	);
// $obj->update("users",$fields,$new_values,$where);

?>
