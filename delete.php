<?php

require_once('db.php');


$id    = $_GET['id'];

$sql = "DELETE FROM todo WHERE id = :id";
$SORGU = $DB->prepare($sql);

$SORGU->bindParam(':id', $id, PDO::PARAM_STR);

$SORGU->execute();

usleep(500000);
header("Location: index.php");