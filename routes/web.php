<?php


Auth::routes();
Route::get('/', ['as'=>'/', 'uses'=>'LoginController@getLogin']);
Route::post('/login',['as'=>'login','uses'=>'LoginController@postLogin']);
Route::get('/loginpage', 'LoginController@getLogin');

Route::get('/nopermissionpage', function () { 
	return view('nopermission');
});
Route::group(['middleware'=>['auth']], function(){
	Route::get('/dashboard', ['as'=>'dashboard', 'uses'=>'Controller@dashboard']);
	Route::get('/logout',['as'=>'logout', 'uses'=>'LoginController@getLogout']);
	Route::get('/admin',['as'=>'admin', 'uses'=>'AdminController@dashboard']);
	Route::get('/studentPage',['as'=>'studentPage', 'uses'=>'AdminController@student']);
	Route::get('/login/index', 'LoginController@index');
});

Route::group(['middleware'=>['authen','roles'],'roles'=>['admin']],function(){

	Route::get('/student', ['as'=>'studentlist', 'uses'=>'AdminController@StudentList']);
	Route::get('/employee', ['as'=>'EmployeeList', 'uses'=>'AdminController@EmployeeList']);
	Route::get('/college', ['as'=>'CollegeList', 'uses'=>'AdminController@CollegeList']);
	Route::get('/building', ['as'=>'BuildingList', 'uses'=>'AdminController@BuildingList']);
	Route::get('/course', ['as'=>'CourseList', 'uses'=>'AdminController@CourseList']);
	Route::get('/curriculum', ['as'=>'CurriculumList', 'uses'=>'AdminController@CurriculumList']);
});
Route::group(['middleware'=>['authen','roles'],'roles'=>['student']],function(){

	
	
	

});

