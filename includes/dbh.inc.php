<?php


//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["eu-cdbr-west-01.cleardb.com"];
$cleardb_username = $cleardb_url["b97b03f8136a9c"];
$cleardb_password = $cleardb_url["2436b5a9"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

if(!$conn) {
    die( "<script>alert('Connection Failed')</script>");
}