<div class="content">

<h2>Search for an Actor or Movie</h2>

<form method="GET">
  <input type="hidden" name="page" value="search">

  <p><b>Enter a search:</b><br />
  <INPUT TYPE="text" NAME="search" SIZE=50 >
  </p>

  <input type="submit" value="Search" />
</form>

<?php
  $search = $_GET["search"];
  if(isset($search)) {
    $db_connection = mysql_connect("localhost", "cs143", "");
    mysql_select_db("CS143", $db_connection);

    $words = explode(' ', $search);

    $query = "SELECT DISTINCT id, CONCAT(first, ' ', last) AS name, dob, dod FROM Actor WHERE ";

    for($i = 0; $i < count($words); $i++) {
      $word = $words[$i];
      $query .= "(first LIKE '%$word%' OR last LIKE '%$word%')";
      if($i + 1 != count($words)) {
        $query .= " AND ";
      }
    }

    print "<p><b>Actor Results</b><br /></p>";

    $rs = mysql_query($query, $db_connection);
    print "<table border='1'>";
    for($i = 0; $i < mysql_num_fields($rs); $i++) {
      $field_info = mysql_fetch_field($rs, $i);
      print "<th>{$field_info->name}</th>";
    }
    while($row = mysql_fetch_row($rs)) {
      print "<tr>";
      $first = 1;
      foreach($row as $value) {
        if($first) {
          print "<td><a href='index.php?page=browse-actor&id=$value'>$value</a></td>";
          $first = 0;
        }
        else if(is_null($value)) {
          print "<td>NULL</td>";
        }
        else {
          print "<td>$value</td>";
        }
      }
      print "</tr>";
    }
    print "</table>";

    print "<br />";

    print "<hr>";

    print "<p><b>Movie Results</b><br /></p>";

    $query = "SELECT DISTINCT id, title, year FROM Movie WHERE ";

    for($i = 0; $i < count($words); $i++) {
      $word = $words[$i];
      $query .= "title LIKE '%$word%'";
      if($i + 1 != count($words)) {
        $query .= " AND ";
      }
    }

    $rs = mysql_query($query, $db_connection);
    print "<table border='1'>";
    for($i = 0; $i < mysql_num_fields($rs); $i++) {
      $field_info = mysql_fetch_field($rs, $i);
      print "<th>{$field_info->name}</th>";
    }
    while($row = mysql_fetch_row($rs)) {
      print "<tr>";
      $first = 1;
      foreach($row as $value) {
        if($first) {
          print "<td><a href='index.php?page=browse-movie&id=$value'>$value</a></td>";
          $first = 0;
        }
        else if(is_null($value)) {
          print "<td>NULL</td>";
        }
        else {
          print "<td>$value</td>";
        }
      }
      print "</tr>";
    }
    print "</table>";

    mysql_close($db_connection);
  }
?>

</div>
