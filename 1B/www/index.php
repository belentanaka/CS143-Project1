<?php

$page = "page-home.php";
$title = "IMDb III: Tokyo Drift";

if(isset($_GET["page"])) {
    if($_GET["page"] == "add-person") {
        $page = "page-add-person.php";
        $title = "Add New Actor or Director";
    }

    if($_GET["page"] == "add-movie") {
        $page = "page-add-movie.php";
        $title = "Add New Movie";
    }

    if($_GET["page"] == "add-comment") {
        $page = "page-add-comment.php";
        $title = "Add New Comment";
    }

    if($_GET["page"] == "add-actor-movie") {
        $page = "page-add-actor-movie.php";
        $title = "Add Actor to Movie";
    }

    if($_GET["page"] == "add-director-movie") {
        $page = "page-add-director-movie.php";
        $title = "Add Director to Movie";
    }

    if($_GET["page"] == "browse-actor") {
        $page = "page-browse-actor.php";
        $title = "Browse Actor Info";
    }

    if($_GET["page"] == "browse-movie") {
        $page = "page-browse-movie.php";
        $title = "Browse Movie Info";
    }

    if($_GET["page"] == "search") {
        $page = "page-search.php";
        $title = "Search";
    }
}

include("header.php");

include("sidebar.php");

include($page);

?>
