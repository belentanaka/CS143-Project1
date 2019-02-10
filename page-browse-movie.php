<h2>Movie Information</h2>


<p>Title:
<?php 
  $db_connection = mysql_connect("localhost", "cs143", "");
  mysql_select_db("CS143", $db_connection);
  $id = $_GET["id"];
  $query = "SELECT title FROM Movie WHERE id = ";
  $query = $query.$id;
  $query = $query.";";
  $rs = mysql_query($query, $db_connection);
  
  while($row = mysql_fetch_row($rs)) {
    foreach($row as $value) {
      print "<td>$value</td>";
    }
  }
?><br />

Release Year: 
<?php 
  $db_connection = mysql_connect("localhost", "cs143", "");
  mysql_select_db("CS143", $db_connection);
  $id = $_GET["id"];
  $query = "SELECT year FROM Movie WHERE id = ";
  $query = $query.$id;
  $query = $query.";";
  $rs = mysql_query($query, $db_connection);
  
  while($row = mysql_fetch_row($rs)) {
    foreach($row as $value) {
      print "<td>$value</td>";
    }
  }
?><br />

Director: 
<?php 
  $db_connection = mysql_connect("localhost", "cs143", "");
  mysql_select_db("CS143", $db_connection);
  $id = $_GET["id"];
  $query = "SELECT CONCAT(Director.first,\" \", Director.last) 
			FROM Director,MovieDirector 
			WHERE Director.id = MovieDirector.did AND MovieDirector.mid = ".$id.";";
  $query = $query.$id;
  $query = $query.";";
  $rs = mysql_query($query, $db_connection);
  
  while($row = mysql_fetch_row($rs)) {
    foreach($row as $value) {
      print "<td>$value</td>";
    }
  }
?><br />

Director: 
<?php 
  $db_connection = mysql_connect("localhost", "cs143", "");
  mysql_select_db("CS143", $db_connection);
  $id = $_GET["id"];
  $query = "SELECT genre 
			FROM MovieGenre 
			WHERE MovieGenre.mid = ".$id.";";
  $query = $query.$id;
  $query = $query.";";
  $rs = mysql_query($query, $db_connection);
  
  while($row = mysql_fetch_row($rs)) {
    foreach($row as $value) {
      print "<td>$value</td>";
    }
  }
?><br />

MPAA Rating: 
<?php 
  $db_connection = mysql_connect("localhost", "cs143", "");
  mysql_select_db("CS143", $db_connection);
  $id = $_GET["id"];
  $query = "SELECT rating FROM Movie WHERE id = ";
  $query = $query.$id;
  $query = $query.";";
  $rs = mysql_query($query, $db_connection);
  
  while($row = mysql_fetch_row($rs)) {
    foreach($row as $value) {
      print "<td>$value</td>";
    }
  }
?><br />

Production Company: 
<?php 
  $db_connection = mysql_connect("localhost", "cs143", "");
  mysql_select_db("CS143", $db_connection);
  $id = $_GET["id"];
  $query = "SELECT company FROM Movie WHERE id = ";
  $query = $query.$id;
  $query = $query.";";
  $rs = mysql_query($query, $db_connection);
  
  while($row = mysql_fetch_row($rs)) {
    foreach($row as $value) {
      print "<td>$value</td>";
    }
  }
?><br />

ID: 
<?php 
  $id = $_GET["id"];
  echo $id;
?>
<br />

</p>

<hr>

<p><b>Cast</b><br />
<?php
  $db_connection = mysql_connect("localhost", "cs143", "");
  mysql_select_db("CS143", $db_connection);
  $id = $_GET["id"];
  $query = "SELECT MovieActor.aid, CONCAT(Actor.first,\" \", Actor.last) AS name, MovieActor.role 
			FROM Movie,MovieActor 
			WHERE Actor.id = MovieActor.aid AND MovieActor.mid = ".$id.";";
  
  $rs = mysql_query($query, $db_connection);
  print "<table border='1'>";
  for($i = 0; $i < mysql_num_fields($rs); $i++) {
    $field_info = mysql_fetch_field($rs, $i);
    print "<th>{$field_info->name}</th>";
  }
  while($row = mysql_fetch_row($rs)) {
    print "<tr>";
    foreach($row as $value) {
      print "<td>$value</td>";
    }
    print "</tr>";
  }
  print "</table>";
?>
<br />

</p>

<hr>

<p><b>User Comments</b><br />

Average user score:
<?php
  echo " ";
  $db_connection = mysql_connect("localhost", "cs143", "");
  mysql_select_db("CS143", $db_connection);
  $id = $_GET["id"];
  $query = "SELECT AVG(rating) FROM Review WHERE mid = ";
  $query = $query.$id;
  $query = $query.";";
  $rs = mysql_query($query, $db_connection);
  
  while($row = mysql_fetch_row($rs)) {
    foreach($row as $value) {
      print "<td>$value</td>";
    }
  }
  mysql_close($db_connection);
?>
 based on reviews of
<?php
  echo " ";
  $db_connection = mysql_connect("localhost", "cs143", "");
  mysql_select_db("CS143", $db_connection);
  $id = $_GET["id"];
  $query = "SELECT COUNT(rating) FROM Review WHERE mid = ";
  $query = $query.$id;
  $query = $query.";";
  $rs = mysql_query($query, $db_connection);
  
  while($row = mysql_fetch_row($rs)) {
    foreach($row as $value) {
      print "<td>$value</td>";
    }
  }
  mysql_close($db_connection);
?>
 users<br />

<?php
  $db_connection = mysql_connect("localhost", "cs143", "");
  mysql_select_db("CS143", $db_connection);
  $id = $_GET["id"];
  $query = "SELECT name,time,rating,comment 
			FROM Review 
			WHERE mid = ".$id.";";
  
  $rs = mysql_query($query, $db_connection);
  print "<table border='1'>";
  for($i = 0; $i < mysql_num_fields($rs); $i++) {
    $field_info = mysql_fetch_field($rs, $i);
    print "<th>{$field_info->name}</th>";
  }
  while($row = mysql_fetch_row($rs)) {
    print "<tr>";
    foreach($row as $value) {
      print "<td>$value</td>";
    }
    print "</tr>";
  }
  print "</table>";
  mysql_close($db_connection);
?></p>
