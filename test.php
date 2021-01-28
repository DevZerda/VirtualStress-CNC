<?php

include("./Auth/crud.php");

$crud = new CRUD();

echo "\r\n". $crud->user("Jeff", "all"). "\r\n";