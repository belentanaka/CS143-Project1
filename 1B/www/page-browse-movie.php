<div class="content">

<h2>Movie Information</h2>

<?php
  $id = $_GET["id"];
  if(isset($id)) {
    $db_connection = mysql_connect("localhost", "cs143", "");
    mysql_select_db("CS143", $db_connection);

    $query = "SELECT title, year, rating, company
    FROM Movie
    WHERE Movie.id=$id";

    $rs = mysql_query($query, $db_connection);
    $row = mysql_fetch_row($rs);
    $company = array_pop($row);
    $rating = array_pop($row);
    $year = array_pop($row);
    $title = array_pop($row);

    print "Title: $title <br />";
    print "Year: $year <br />";
    print "Rating: $rating <br />";
    print "Company: $company <br />";

    $query = "SELECT CONCAT(Director.first, ' ', Director.last) as name
    FROM Director, MovieDirector
    WHERE MovieDirector.mid=$id AND MovieDirector.did=Director.id";

    $rs = mysql_query($query, $db_connection);
    $row = mysql_fetch_row($rs);
    $name = array_pop($row);

    print "Director: $name<br />";

    $query = "SELECT genre
    FROM MovieGenre
    WHERE mid=$id";

    $rs = mysql_query($query, $db_connection);
    $genrelist = array();
    while($row = mysql_fetch_row($rs)) {
      $genre = array_pop($row);
      array_push($genrelist, $genre);
    }

    $genre = "";
    for($i = 0; $i < count($genrelist); $i++) {
      $genre .= $genrelist[$i];
      if($i + 1 != count($genrelist)) {
        $genre .= ", ";
      }
    }

    if($genre == "") {
      $genre = "N/A";
    }

    print "Genre: $genre<br />";

    print "<hr>";

    print "<p><b>Actors and Roles</b><br /></p>";

    $query = "SELECT DISTINCT MovieActor.aid AS id, CONCAT(Actor.first, ' ', Actor.last) AS title, MovieActor.role AS role
    FROM MovieActor, Actor
    WHERE MovieActor.mid=$id AND MovieActor.aid=Actor.id";

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
    print "</table> <br />";

    print "<hr>";

    print "<p><b>Comments</b><br /></p>";

    print "<form method='GET'>";
    print "<input type='hidden' name='page' value='add-comment'>";
    print "<input type='hidden' name='mid' value=$id>";
    print "<input type='submit' value='Add Comment'>";
    print "</form>";

    $query = "SELECT COUNT(*)
    FROM Review
    WHERE Review.mid=$id";

    $rs = mysql_query($query, $db_connection);
    $row = mysql_fetch_row($rs);
    $count = array_pop($row);

    if($count == 0) {
      print "<p>No comments yet.</p>";
    }
    else {
      $query = "SELECT AVG(rating)
      FROM Review
      WHERE Review.mid=$id";

      $rs = mysql_query($query, $db_connection);
      $row = mysql_fetch_row($rs);
      $avgscore = array_pop($row);

      print "<p>Average user score: $avgscore (Based on reviews of $count users)</p>";

      $query = "SELECT name, time, rating, comment
      FROM Review
      WHERE mid=$id";

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
          print "<td>$value</td>";
        }
        print "</tr>";
      }
      print "</table>";
    }

    mysql_close($db_connection);
  }
?>

</div>
