<div class="content">

<h2>Actor Information</h2>

<?php
  $id = $_GET["id"];
  if(isset($id)) {
    $db_connection = mysql_connect("localhost", "cs143", "");
    mysql_select_db("CS143", $db_connection);

    $query = "SELECT first, last, sex, dob, dod FROM Actor WHERE id=$id";

    $rs = mysql_query($query, $db_connection);
    $row = mysql_fetch_row($rs);
    $dod = array_pop($row);

    if(is_null($dod)) {
      $dod = "N/A";
    }

    $dob = array_pop($row);
    $sex = array_pop($row);
    $last = array_pop($row);
    $first = array_pop($row);

    print "First Name: $first <br />";
    print "Last Name: $last <br />";
    print "Sex: $sex <br />";
    print "Date of Birth: $dob <br />";
    print "Date of Death: $dod <br />";

    print "<hr>";

    print "<p><b>Movies and Roles</b><br /></p>";

    $query = "SELECT DISTINCT MovieActor.mid AS id, Movie.title AS title, MovieActor.role AS role
    FROM MovieActor, Movie
    WHERE MovieActor.aid=$id AND MovieActor.mid=Movie.id";

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
