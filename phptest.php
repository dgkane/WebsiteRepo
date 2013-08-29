<HTML>
<HEAD>
<TITLE>Hotels sorted by city then name</TITLE>
</HEAD>
<BODY bgcolor="#FFFFFF">

<?php
         $conn = pg_connect("host=pgdbs8 user=wwwuser 
                  dbname=dwt password=wwwuser");

         if (!$conn) {
             echo "An error occured.\n";
             exit;
         }

	 if($conn) {
	    echo "Connection established.\n";
	    
	 }

	 $sql="SELECT issue FROM jfs order by title ;";
	 
	 $result_set = pg_Exec($conn, $sql);
	 $rows = pg_NumRows($result_set);

	 if ((!$result_set) || ($rows < 1)) {
              echo "No result. \n";
              exit;  //exit the script
	 }

	 if(($result_set) && ($rows > 0)) {
	     echo "Got rows.\n";
	 }

	 echo $rows;

         
         for($j=0; $j < $rows; $j++)
	     {
		$issue = pg_result($result_set, $j, "issue");
		echo $issue;
	     }
		
	
   

?>

</BODY>
</HTML>
