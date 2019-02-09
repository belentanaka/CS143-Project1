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
  <SELECT NAME="genre">
  <OPTION SELECTED>Action
  <OPTION>Adult
  <OPTION>Adventure
  <OPTION>Animation
  <OPTION>Comedy
  <OPTION>Crime
  <OPTION>Documentary
  <OPTION>Drama
  <OPTION>Family
  <OPTION>Fantasy
  <OPTION>Horror
  <OPTION>Musical
  <OPTION>Mystery
  <OPTION>Romance
  <OPTION>Sci-fi
  <OPTION>Short
  <OPTION>Thriller
  <OPTION>War
  <OPTION>Western
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

    $year = $_GET["year"];
    $rating = $_GET["rating"];
    $genre = $_GET["genre"];
    $company = $_GET["company"];

    $query = "INSERT INTO Movie VALUES($id, '$title', '$year', '$rating', '$company')";

    $rs = mysql_query($query, $db_connection);

    if(!$rs) {
      echo "ERROR: Failed To Add Movie";
      return;
    }

    $query = "INSERT INTO MovieGenre VALUES($id, '$genre')";

    $rs = mysql_query($query, $db_connection);

    if($rs) {
      echo "Successfully Added Movie!";
    }
    else {
      echo "ERROR: Failed To Add Movie";
    }

    mysql_close($db_connection);
  }
?>
</div>
