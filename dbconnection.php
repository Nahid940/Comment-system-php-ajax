<?php

class dbconnection{
    public $con;
    
    function __construct(){
        $this->con=mysqli_connect("localhost","root","","comment");
    }
    
    function insertIntoCommentTable($tableName,$data){
        $string="insert into ".$tableName." (";
         $string .=implode(",",array_keys($data)).') values(' ;
         $string .= " ' " . implode("', '",array_values($data))."')";

         if(mysqli_query($this->con,$string)){
             return true;
         }else{
             echo mysqli_errno($this->con);
         }
    }
	
}
?>