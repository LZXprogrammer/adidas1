<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//创建一个后台登录的路由
Route::get('/admin/login', 'admin\LoginController@login');

//在登录页面的输入的信息和数据库的进行比较
Route::controller('/admin/login', 'admin\LoginController');

//这里是验证码的路由
Route::get('/admin/code', 'CodeController@code');

//这里是一个登录的中间件
Route::group(['middleware'=>'login'], function(){

	//创建一个后台首页的路由
	Route::get('/admin', 'admin\AdminController@index');

	// 创建一个后台用户的路由
	Route::controller('/admin/user', 'admin\UserController');

	//这是后台管理员的路由
	Route::controller('/admin/manager', 'admin\ManagerController');

	//创建后台类别的路由
	Route::controller('/admin/type', 'admin\TypeController');

	//创建后台商品的路由
	Route::controller('/admin/good', 'admin\GoodController');

	//创建后台订单的路由
	Route::controller('/admin/order', 'admin\OrderController');

	//创建后台友情链接的路由
	Route::controller('/admin/link', 'admin\LinkController');

	//创建后台公告的路由
	Route::controller('/admin/notice', 'admin\NoticeController');

	//创建后台轮播的路由
	Route::controller('/admin/carousel', 'admin\CarouselController');

	//创建后台地址的路由
	Route::controller('/admin/address', 'admin\AddressController');

});


/**
 * 下面是前台的路由
 */
//前台登录页面
Route::get('/adidas/login', 'adidas\LoginController@login');

//前台登录的操作路由
Route::controller('/adidas/login', 'adidas\LoginController');

//前台注册页面
Route::get('/adidas/register', 'adidas\RegisterController@register');

//前台注册操作路由
Route::controller('/adidas/register', 'adidas\RegisterController');

//这里是一个登录的中间件
Route::group(['middleware'=>'adidaslogin'], function(){

	//前台个人中心操作路由
	Route::controller('/adidas/person', 'adidas\PersonController');

	//前台购物车路由
	Route::controller('/adidas/cart', 'adidas\CartController');

	//前台首页的订单路由
	Route::controller('/adidas/order', 'adidas\OrderController');

});

//前台我的订单路由
// Route::controller('/adidas/myorder', 'adidas\MyorderController');

//前台首页的显示页
Route::get('/adidas', 'adidas\AdidasController@index');

//前台首页的操作路由
Route::controller('/adidas', 'adidas\AdidasController');
