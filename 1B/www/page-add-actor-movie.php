<div class="content">

<h2>Add Actor to Movie Cast</h2>

<form method="GET">
  <input type="hidden" name="page" value="add-actor-movie">

  <p><b>Actor</b><br />
  <select name="aid">
    <?php
      $db_connection = mysql_connect("localhost", "cs143", "");
      mysql_select_db("CS143", $db_connection);
      $rs = mysql_query("SELECT id, first, last FROM Actor");
      while($row = mysql_fetch_row($rs)) {
        $last = array_pop($row);
        $first = array_pop($row);
        $id = array_pop($row);
        print "<option value='$id'>$first $last";
      }
      mysql_close($db_connection);
    ?>
  </select>
  </p>

  <p><b>Movie</b><br />
  <select name="mid">
    <?php
      $db_connection = mysql_connect("localhost", "cs143", "");
      mysql_select_db("CS143", $db_connection);
      $rs = mysql_query("SELECT id, title FROM Movie");
      while($row = mysql_fetch_row($rs)) {
        $title = array_pop($row);
        $id = array_pop($row);
        print "<option value='$id'>$title";
      }
      mysql_close($db_connection);
    ?>
  </select>
  </p>

  <p><b>Role</b><br />
  <INPUT TYPE="text" NAME="role" SIZE=30 MAXLENGTH=50>
  </p>

  <input type="submit" value="Submit" />
</form>

<?php
  $aid = $_GET["aid"];
  if(isset($aid)) {
    $db_connection = mysql_connect("localhost", "cs143", "");
    mysql_select_db("CS143", $db_connection);

    $mid = $_GET["mid"];
    $role = $_GET["role"];

    $query = "INSERT INTO MovieActor VALUES($mid, $aid, '$role')";

    $rs = mysql_query($query, $db_connection);

    if($rs) {
      echo "Successfully Added Actor To Movie!";
    }
    else {
      echo "ERROR: Failed To Add Actor To Movie";
    }

    mysql_close($db_connection);
  }
?>

</div>
