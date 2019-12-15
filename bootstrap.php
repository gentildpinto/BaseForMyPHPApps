<?php

require "vendor/autoload.php";
require "app/functions/helpers.php";

app\classes\Bind::bind('connection', app\models\Connection::connect());