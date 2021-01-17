<?php

return [
	'/' 				=> 'MainController@home',
	'aboutus'			=> 'MainController@aboutus',
	'user'				=> 'UserController@index',
	'contacts' 			=> 'MainController@contacts',
	'blog' 				=> 'BlogController@index',
	'post/{id}' 		=> 'BlogController@show',
	'post/{id}/edit' 	=> 'BlogController@edit',
	'post/{id}/delete' 	=> 'BlogController@delete',
	'post/delete-ajax' 	=> 'BlogController@deleteAjax',
	'post/edit-ajax' 	=> 'BlogController@editAjax',
	'blog/add' 			=> 'BlogController@add',
	'user/registration' => 'UserController@registration',
	'user/{id}/activate'=> 'UserController@activate',
	'user/entrance' 	=> 'UserController@entrance',
	'user/output' 		=> 'UserController@output',
	'pdf' 				=> 'MainController@pdf',
];