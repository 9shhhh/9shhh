<?php
// 웰컴(로그인 폼)
Route::get('/', [
    'as' => 'login',
    'uses' => 'LoginController@index',
]);
// 회원 가입
Route::resource('member','MemberController');
// 로그인
Route::resource('login','LoginController');
// 로그아웃
Route::get('logout',[
    'as'=>'logout',
    'uses'=>'LoginController@destroy'
]);
// 게시판
Route::resource('list','ListController');


