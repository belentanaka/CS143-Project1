<div class="content">

<h2>Insert New Comment</h2>

<form method="GET">
  <input type="hidden" name="page" value="add-comment">

  <p><b>Reviewer Name</b><br />
  <INPUT TYPE="text" NAME="name" SIZE=20 MAXLENGTH=20>
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

  <p><b>Rating</b><br />
  <SELECT NAME="rating">
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
  $name = $_GET["name"];
  if(isset($name)) {
    $db_connection = mysql_connect("localhost", "cs143", "");
    mysql_select_db("CS143", $db_connection);

    $mid = $_GET["mid"];
    $rating = $_GET["rating"];
    $comment = $_GET["comment"];

    $rs = mysql_query("SELECT NOW()", $db_connection);
    while($row = mysql_fetch_row($rs)) {
      $timestamp = array_pop($row);
    }

    $query = "INSERT INTO Review VALUES('$name', '$timestamp', $mid, $rating, '$comment')";

    $rs = mysql_query($query, $db_connection);

    if($rs) {
      echo "Successfully Added Comment!";
    }
    else {
      echo "ERROR: Failed To Add Comment";
    }

    mysql_close($db_connection);
  }
?>

</div>
