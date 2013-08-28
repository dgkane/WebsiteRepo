<!-- Recommended header for tutorial used -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"> -->

<HTML xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<HEAD>

<LINK REL = Stylesheet HREF= "mystylesheet2.css" TYPE = "text/css" MEDIA = screen >
<TITLE>3 Column XHTML/CSS layout test</TITLE>
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
       <P>
       The aim of this project was to create a website displayable in common web browsers that presents information from two online databases, jfs and jnl_url at pgdbs8.inf.brad.ac.uk, which contain details of articles associated with the fictional Journal of Fictional Studies (title, author, issue, page, format and URL) and the names and URLs some associated journals respectively. The specification requires the site to have the following functionality:
       </P>
       <P>
       - A current issue page, with details and links to its associated articles;<BR>
       - The ability to browse the contents of previous issues, with links;<BR>
       - A facility that allows a user to search articles from any issue by title or author;<BR>
       - A page of links to associated journals;<BR>
       - This 'about' page describing the process.</P>
       </P>
       <P>
       The site's pages are written in XML and use the XHTML 1.0 Strict Document Type Declaration (DTD), as declared on the first line of each .php file making up the site:
       </P>
       <P>
       This DTD does not include presentational or deprecated HTML elements, such as font and framesets[1]. Different browsers may not be consistent in the way they display such elements, so presentational data is usually enclosed in a separate .css file, which gives instructions on how to render the XML. The separation of structure and presentation is considered a goal in order for web authoring to progress[2], and the XHTML 1.0 Strict DTD adheres most rigidly to that guideline.
       </P>
       <P>
       <IMG class="displayed" src="/img1.png">
       </P>
       <P>
       Each page contains a number of divisions containing the site's individual elements.
       </P>
	   <P>
	   <IMG class="displayed" src="/img2.png">
	   </P>
       <P>
       Since the XML code contains no presentational data regarding these divisions, those are defined in the accompanying mystylesheet.css file.
       </P>
	   <P>
	   <IMG class="displayed" src="/img3.png">
	   </P>
       <P>
       To maintain presentational consistency, the same .css file is used for every page on the site. The only division that uses different information for each page is the central one. This contains PHP code that retrieves the most up-to-date information from the jfs and jnl_url databases according to the navigation link clicked or the search query entered.
       </P>
       <P>
       Each page uses PHP's pg_connect function to connect to the database before using pg_Exec to send it a specified query string.
       </P>
	   <P>
	   <IMG class="displayed" src="/img4.png">
	   </P>
       <P>
       The Current Issue page retrieves all tuples in the jfs database with the current maximum issue number and sorts them in ascending order before it loops over the tuples and saves the requested information in variables to be printed to screen later.
       </P>
       <P>
       Some extra subclasses of <P> were defined in the .css file to give different types of data different appearances, making the information easier to read.
       </P>
	   <P>
	   <IMG class="displayed" src="/img5.png">
	   </P>
       <P>
       The External links page simply retrieves all information from the jnl_url table.
       </P>
       <P>
       A similar technique is used to display all articles from a particular issue, but the user is first given a choice of issue from all current ones in the database. A list of all current issue numbers is derived with the SQL query:
       </P>
	   <P>
	   <IMG class="displayed" src="/img6.png">
	   </P>
       <P>
       Each issue is displayed in hyperlinked text that passes a variable 'selectedissue' to the linked page, and a PHP script on that page retrieves the variable and uses it in the SQL query.
       </P>
	   <P>
	   <IMG class="displayed" src="/img7.png">
	   </P>
       <P>
       The Search functions work in a similar manner, sending the information entered into the text field as a string to base the SQL query on.
       </P>
	   <P>
	   <IMG class="displayed" src="/img8.png">
	   </P>
       <P>
       [1] W3C. (unknown). HTML declaration. Available: http://www.w3schools.com/tags/tag_doctype.asp. Last accessed 11th Jan 2013.<BR>
       [2] http://www.webstandards.org/learn/tutorials/common_ideas/
       </P>
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
