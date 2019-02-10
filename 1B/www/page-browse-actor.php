<h2>Actor Information</h2>

<?php
  $db_connection = mysql_connect("localhost", "cs143", "");
  mysql_select_db("CS143", $db_connection);
?>

<p>
<?php 
  $id = $_GET["id"];
  $query = "SELECT * FROM Actor WHERE id = ";
  $query = $query.$id;
  $query = $query.";";
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

</p>

<hr>

<p><b>Roles</b><br />
<?php
  $id = $_GET["id"];
  $query = "SELECT MovieActor.mid,Movie.title, MovieActor.role 
			FROM Movie,MovieActor 
			WHERE Movie.id = MovieActor.mid AND MovieActor.aid = ".$id.";";
  
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

<?php
  mysql_close($db_connection);
?>