<?php

$route[] = ['/', 'HomeController@index'];
$route[] = ['/posts', 'PostController@index'];
return $route;