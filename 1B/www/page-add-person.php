<h2>Insert New Actor Or Director</h2>

<form method="GET">
  <input type="hidden" name="page" value="add-person">

  <p><b>Actor or Director</b><br />
  <INPUT TYPE="radio" NAME="type" VALUE="Actor" CHECKED>
  Actor
  <INPUT TYPE="radio" NAME="type" VALUE="Director">
  Director
  </p>

  <p><b>Name</b><br />
  First name
  <INPUT TYPE="text" NAME="first" SIZE=10 MAXLENGTH=20>
  Last name
  <INPUT TYPE="text" NAME="last" SIZE=10 MAXLENGTH=20>
  </p>

  <p><b>Sex</b><br />
  <INPUT TYPE="radio" NAME="sex" VALUE="Male" CHECKED>
  Male <br />
  <INPUT TYPE="radio" NAME="sex" VALUE="Female">
  Female <br />
  <INPUT TYPE="radio" NAME="sex" VALUE="Other">
  Other
  </p>

  <p><b>Date of birth</b><br />
  <INPUT TYPE="text" NAME="dob" SIZE=10 MAXLENGTH=20>
  (in YYYY-DD-MM)
  </p>

  <p><b>Date of death</b><br />
  <INPUT TYPE="text" NAME="dod" SIZE=10 MAXLENGTH=20>
  (in YYYY-DD-MM)
  </p>

  <input type="submit" value="Submit" />
</form>

<?php
  $db_connection = mysql_connect("localhost", "cs143", "");
  mysql_select_db("CS143", $db_connection);
  $type = $_GET["type"];
  $first = $_GET["first"];
  $last = $_GET["last"];
  $sex = $_GET["sex"];
  $dob = $_GET["dob"];
  $dod = $_GET["dod"];
  if($type == "Actor") {
    $query = "INSERT INTO $type VALUES()
  }
  else {

  }
  $rs = mysql_query($query, $db_connection);
  mysql_close($db_connection);
?>
