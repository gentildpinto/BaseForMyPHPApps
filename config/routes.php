<?php

$route[] = ['/', 'HomeController@index'];
$route[] = ['/posts', 'PostController@index'];
$route[] = ['/post/{id}/show', 'PostController@show'];
$route[] = ['/post/create', 'PostController@create'];
$route[] = ['/post/store', 'PostController@store'];
$route[] = ['/post/{id}/edit', 'PostController@edit'];
$route[] = ['/post/update', 'PostController@update'];
$route[] = ['/post/{id}/delete', 'PostController@delete'];

return $route;