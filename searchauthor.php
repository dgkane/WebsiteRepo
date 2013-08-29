<!-- Recommended header for tutorial used -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"> -->

<HTML xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<HEAD>

<LINK REL = Stylesheet HREF= "mystylesheet2.css" TYPE = "text/css" MEDIA = screen >
<TITLE>Journal Of Fictional Studies: Search by author</TITLE>
</HEAD>

<BODY>

<div id="wrapper">
  <div id="header"><IMG class="displayed" src="/logo.png"></div>
  <div id="content">
    <div id="content-left">
    <P class="p1"><A HREF="/currentissue.php">Current Issue</A></P>
      <P class="p1"><A HREF="/previssues.php">Previous Issues</A></P>
      <P class="p1"><A HREF="/externallinks.php">External Links</A></P>
      <P class="p1"><A HREF="/about.php">About</A></P>
    </div>
   <div id="content-middle">
       <P class="p4">
       <?php
         $searchquery = $_REQUEST["authorquery"];
	 
         $conn = pg_connect("host=pgdbs8 user=wwwuser 
                  dbname=dwt password=wwwuser");

         if (!$conn) {
             echo "An error occured.\n";
         }

	 if($conn) {
	    echo "Connection established.\n";
	    
	 }

	 $sql="select * from jfs where author ilike '%".$searchquery."%' order by issue desc ;";
	 
	 $result_set = pg_Exec($conn, $sql);
	 $rows = pg_NumRows($result_set);

	 if ((!$result_set) || ($rows < 1)) {
              echo "No result. ";
	 }

	 if(($result_set) && ($rows > 0)) {
	     echo "Got $rows rows of data. ";
	 }
         ?>
         </P>
         <HR>
	 <HR>
	 <P class="p1">Search by author: <?php echo $searchquery ?></P>
	 <HR>
	 <HR>
         <?php         
         for($j=0; $j < $rows; $j++)
	     {
		$issue = pg_result($result_set, $j, "issue");
                $page = pg_result($result_set, $j, "page");
                $title = pg_result($result_set, $j, "title");
                $author = pg_result($result_set, $j, "author");
                $format = pg_result($result_set, $j, "format");
                $url = pg_result($result_set, $j, "url");
	     
       ?></P>
       <P class="p3">Issue <?php echo $issue ?>, page <?php echo $page ?></P>
       <P class="p1"><?php echo $title ?><P>
       <P class="p2"><?php echo $author ?><P>
       <P class="p3">Available in: <?php echo $format ?></P>
       <P class="p4"><A HREF="<?php echo $url ?>"><?php echo $url ?></A></P>
       <HR>
       <?php } ?>
       
	
    </div>
   <div id="content-right">
   <P class="p1">Search</P>
   <P><FORM name="title" method="post" action="searchtitle.php">
      <INPUT type="text" name="titlequery">
      <INPUT type="submit" value="Search by Article Title">
      </FORM></P>
    <P><FORM name="author" method="post" action="searchauthor.php">
      <INPUT type="text" name="authorquery">
      <INPUT type="submit" value="Search by Author">
      </FORM></P>
    </div>
 </div>
 <div id="footer"><P class="p4"><BR>The Journal of Fictional Studies is published by the Institute for Fictional Affairs.</P>
       <P class="p4">Created for Deploying Web Technologies, Computer Science for Games (Stage 3) BSc.<BR>
	  Author: David Kane, U0B 10014264, <A HREF="mailto:dgkane@student.bradford.ac.uk">email</A></P>
 </div>
</div>      


</BODY>

</HTML>

