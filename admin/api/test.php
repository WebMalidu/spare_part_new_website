<?php

header("Content-Type: application/json; charset=UTF-8");


$data=file_get_contents("php://input");
echo($data);