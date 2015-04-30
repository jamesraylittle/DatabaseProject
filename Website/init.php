<?php
/* Database Connection Information */
$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASS = "";
$DB_NAME = "ttu";


/* Generic Include Functions */
function add($folder, $file) {
    include($folder."/".$file.".php");
}

function addInclude($includeFile) {
    add("includes", $includeFile);
}

function addModel($modelFile) {
    add("models", $modelFile);
}


/* Actual Includes */
addInclude("Page");
addInclude("Database");

/* Models */
addModel("Instructor");


/* Object Creations */
$DB = new Database($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);




