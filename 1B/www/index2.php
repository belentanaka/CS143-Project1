<!DOCTYPE html>
<html>
<body>

<h1>IMDb III: Tokyo Drift</h1>

<form action="index.php" method="GET">
      <textarea name="query" cols="60" rows="8"><?php print "$query" ?></textarea><br />
      <input type="submit" value="Submit" />
</form>

<?php
  $db_connection = mysql_connect("localhost", "cs143", "");
  mysql_select_db("CS143", $db_connection);
  $query = $_GET["query"];
  echo $_GET["query"];
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

</html>
