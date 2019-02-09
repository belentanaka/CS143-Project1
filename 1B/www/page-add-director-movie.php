<h2>Add Director to Movie</h2>

<form method="GET">
  <input type="hidden" name="page" value="add-comment">

  <p><b>Director ID</b><br />
  <INPUT TYPE="text" NAME="did" SIZE=10 >
  </p>
  
  <p><b>Movie ID</b><br />
  <INPUT TYPE="text" NAME="mid" SIZE=10 >
  </p>

  <input type="submit" value="Submit" />
</form>

<?php
  $db_connection = mysql_connect("localhost", "cs143", "");
  mysql_select_db("CS143", $db_connection);
  $aid = $_GET["aid"];
  $did = $_GET["mid"];
  $query;
  $rs = mysql_query($query, $db_connection);
  mysql_close($db_connection);
?>