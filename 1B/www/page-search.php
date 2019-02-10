<h2>Search for an Actor or Movie</h2>

<form method="GET">
  <input type="hidden" name="page" value="search">

  <p><b>Search for an actor </b><br />
  <INPUT TYPE="text" NAME="search" SIZE=50 >
  </p>

  <input type="submit" value="Submit" />
</form>

<p><b>Actor Results</b><br />
<?php
  $db_connection = mysql_connect("localhost", "cs143", "");
  mysql_select_db("CS143", $db_connection);
  $search = $_GET["search"];
  $query = "SELECT * FROM Actor WHERE first = ";
  $searchlist = explode(" ", $search);
  foreach($searchlist as $s){
	  $query = "SELECT * FROM Actor WHERE first = ";
	  $query = $query.$s; 
	  $query = $query.";";
	  echo $query;
	  $rs = mysql_query($query, $db_connection);
  }
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

<p><b>Movie Results</b><br />
<?php
  $search = $_GET["search"];
  $query = "SELECT * FROM Movie WHERE title = ";
  $query = $query.$search; 
  $query = $query.";";
  echo $query;
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
?>
</p>