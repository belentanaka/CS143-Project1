<?php

$page = "page-home.php";
$title = "IMDb III: Tokyo Drift";

if(isset($_GET["page"])) {
    if($_GET["page"] == "add-person") {
        $page = "page-add-person.php";
    }

    if($_GET["page"] == "add-movie") {
        $page = "page-add-movie.php";
    }

    if($_GET["page"] == "add-comment") {
        $page = "page-add-comment.php";
    }

    if($_GET["page"] == "add-actor-movie") {
        $page = "page-add-actor-movie.php";
    }

    if($_GET["page"] == "add-director-movie") {
        $page = "page-add-director-movie.php";
    }

    if($_GET["page"] == "browse-actor") {
        $page = "page-browse-actor.php";
    }

    if($_GET["page"] == "browse-movie") {
        $page = "page-browse-movie.php";
    }

    if($_GET["page"] == "search") {
        $page = "page-search.php";
    }
}

include("header.php");

include("sidebar.php");

include($page);

?>
