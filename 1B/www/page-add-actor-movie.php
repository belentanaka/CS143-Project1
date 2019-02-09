<h2>Add Actor to Movie Cast</h2>

<form method="GET">
  <input type="hidden" name="page" value="add-comment">

  <p><b>Actor ID</b><br />
  <INPUT TYPE="text" NAME="aid" SIZE=10 >
  </p>
  
  <p><b>Movie ID</b><br />
  <INPUT TYPE="text" NAME="mid" SIZE=10 >
  </p>

  <p><b>Role</b><br />
  <INPUT TYPE="text" NAME="role" SIZE=30 MAXLENGTH=50>
  </p>

  <input type="submit" value="Submit" />
</form>

<?php
  $db_connection = mysql_connect("localhost", "cs143", "");
  mysql_select_db("CS143", $db_connection);
  $aid = $_GET["aid"];
  $mid = $_GET["mid"];
  $role = $_GET["role"];
  $query;
  $rs = mysql_query($query, $db_connection);
  mysql_close($db_connection);
?>