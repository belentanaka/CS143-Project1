<div class="content">

<h2>Add Director to Movie</h2>

<form method="GET">
  <input type="hidden" name="page" value="add-director-movie">

  <p><b>Director</b><br />
    <select name="did">
      <?php
        $db_connection = mysql_connect("localhost", "cs143", "");
        mysql_select_db("CS143", $db_connection);
        $rs = mysql_query("SELECT id, first, last FROM Director");
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

  <input type="submit" value="Submit" />
</form>

<?php
  $did = $_GET["did"];
  if(isset($did)) {
    $db_connection = mysql_connect("localhost", "cs143", "");
    mysql_select_db("CS143", $db_connection);

    $mid = $_GET["mid"];

    $query = "INSERT INTO MovieDirector VALUES($mid, $did)";

    $rs = mysql_query($query, $db_connection);

    if($rs) {
      echo "Successfully Added Director To Movie!";
    }
    else {
      echo "ERROR: Failed To Add Director To Movie";
    }

    mysql_close($db_connection);
  }
?>

</div>
