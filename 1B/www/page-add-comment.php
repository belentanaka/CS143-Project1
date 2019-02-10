<!DOCTYPE html>
<html>
<body>

<h2>Insert New Movie</h2>

<form method="GET">
  <input type="hidden" name="page" value="add-comment">

  <p><b>Reviewer Name</b><br />
  <INPUT TYPE="text" NAME="name" SIZE=20 MAXLENGTH=20>
  </p>
  
  <p><b>Movie ID</b><br />
  <INPUT TYPE="text" NAME="mid" SIZE=10 >
  </p>

  <p><b>Rating</b><br />
  <SELECT NAME="genre">
  <OPTION>1
  <OPTION>2
  <OPTION>3
  <OPTION>4
  <OPTION>5
  <OPTION>6
  <OPTION>7
  <OPTION>8
  <OPTION>9
  <OPTION>10
  </SELECT>

  <p><b>Comment</b><br />
  <textarea name="comment" cols="50" rows="10"></textarea><br />
  </p>

  <input type="submit" value="Submit" />
</form>

<?php
  $db_connection = mysql_connect("localhost", "cs143", "");
  mysql_select_db("CS143", $db_connection);
  $name = $_GET["name"];
  $mid = $_GET["mid"];
  $rating = $_GET["rating"];
  $comment = $_GET["comment"];
  $timestamp = "NOW()";
  $query;
  $rs = mysql_query($query, $db_connection);
  mysql_close($db_connection);
?>
</html>