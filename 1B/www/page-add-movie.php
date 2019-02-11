<div class="content">

<h2>Insert New Movie</h2>

<form method="GET">
  <input type="hidden" name="page" value="add-movie">

  <p><b>Title</b><br />
  <INPUT TYPE="text" NAME="title" SIZE=40 MAXLENGTH=100>
  </p>

  <p><b>Year</b><br />
  <INPUT TYPE="text" NAME="year" SIZE=10 MAXLENGTH=20>
  (in YYYY)
  </p>

  <p><b>MPAA Rating</b><br />
  <SELECT NAME="rating">
  <OPTION SELECTED>G
  <OPTION>PG
  <OPTION>PG-13
  <OPTION>R
  <OPTION>NC-17
  </SELECT>

  <p><b>Genre</b><br />
  <SELECT multiple="multiple" NAME="genre[]">
  <OPTION SELECTED="selected" value="Action">Action
  <OPTION value="Adult">Adult
  <OPTION value="Adventure">Adventure
  <OPTION value="Animation">Animation
  <OPTION value="Comedy">Comedy
  <OPTION value="Crime">Crime
  <OPTION value="Documentary">Documentary
  <OPTION value="Drama">Drama
  <OPTION value="Family">Family
  <OPTION value="Fantasy">Fantasy
  <OPTION value="Horror">Horror
  <OPTION value="Musical">Musical
  <OPTION value="Mystery">Mystery
  <OPTION value="Romance">Romance
  <OPTION value="Sci-fi">Sci-fi
  <OPTION value="Short">Short
  <OPTION value="Thriller">Thriller
  <OPTION value="War">War
  <OPTION value="Western">Western
  </SELECT>

  <p><b>Production Company</b><br />
  <INPUT TYPE="text" NAME="company" SIZE=20 MAXLENGTH=50>
  </p>

  <input type="submit" value="Submit" />
</form>

<?php
  $title = $_GET["title"];

  if(isset($title)) {
    $db_connection = mysql_connect("localhost", "cs143", "");
    mysql_select_db("CS143", $db_connection);

    $rs = mysql_query("SELECT id FROM MaxMovieID");
    $row = mysql_fetch_row($rs);
    foreach($row as $value) {
      $id = (int)$value + 1;
    }

    $rs = mysql_query("UPDATE MaxMovieID SET id = $id", $db_connection);

    if(!$rs) {
      echo "ERROR: Failed To Add Movie";
      return;
    }

    if($title == "") {
      $title = "NULL";
    }
    else {
      $title = "'$title'";
    }

    $year = $_GET["year"];
    if($year == "") {
      $year = "NULL";
    }

    $rating = $_GET["rating"];
    $rating = "'$rating'";

    $genrelist = $_GET["genre"];

    $company = $_GET["company"];
    if($company == "") {
      $company = "NULL";
    }
    else {
      $company = "'$company'";
    }

    $query = "INSERT INTO Movie VALUES($id, $title, $year, $rating, $company)";

    $rs = mysql_query($query, $db_connection);

    if(!$rs) {
      echo "ERROR: Failed To Add Movie";
      return;
    }

    foreach($genrelist as $genre) {
      $query = "INSERT INTO MovieGenre VALUES($id, '$genre')";

      $rs = mysql_query($query, $db_connection);

      if(!$rs) {
        echo "ERROR: Failed To Add Movie";
        return;
      }
    }

    echo "Successfully Added Movie!";

    mysql_close($db_connection);
  }
?>
</div>
