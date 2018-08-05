<?php 
	class DB_MySQL{
		var $connection = NULL;
		var $result = NULL;
		 
		function connect($host,$db,$user,$pass){
			$this->connection=mysql_connect($host,$user,$pass);
			mysql_select_db($db,$this->connection);
			mysql_query("set names utf8");
			}//end Funtion connect
		
		/*/*******************************************************/
		function disconnect(){
			if(is_resource($this->connection)){
				mysql_close($this->connection);
				}
			}
		/***************************************************/
		function query($query)
		{
			if(is_resource($this->connection))
			{
				if(is_resource($this->result))
				{
					mysql_free_result($this->result);
				}
				$this->result=mysql_query($query,$this->connection);
			}
		}
		
		/**********************************************************/
			function fetchRow()
			{
				if(is_resource($this->result))
				{
					$row=mysql_fetch_assoc($this->result);
					if(is_array($row))
					{
						return $row;
					}
					else 
						return false;
				}
			}
		/*******************************************************/		
	}
?>