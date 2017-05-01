<?php

use Phalcon\Loader;
use Phalcon\Tag;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Url;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
require_once '../debug.php';

try {

//Register an autoloder
$loader = new Loader();
$loader->registerDirs(
	[
		"../app/controllers/",
		"../app/models/",
	]);

$loader->register();

//Create DI
//Phalcon\Di\FactoryDefault 是 Phalcon\Di 的一个变体。为了让事情变得更容易，它已注册了Phalcon的大多数组件。
// 因此，我们不需要一个一个注册这些组件。在以后更换工厂服务的时候也不会有什么问题。
$di = new FactoryDefault();


//定义数据库
/*	$di->set(
		"db",
		function () {
			return new DbAdapter(
				[
					"host"     => "127.0.0.1",
					"username" => "root",
					"password" => "root",
					"dbname"   => "demosky",
				]
			);
		}
	);*/

$di['db'] = function () {
		return new DbAdapter(
			array(
				'host'      => '127.0.0.1',
				'username'	=>  'root',
				'password'  =>  'root',
				'dbname'    =>  'demosky'
			));
	};

//设置视图组件
$di['view'] = function () {
	$view = new View();
	$view->setViewsDir('../app/views');
	return $view;
};





// 设置基础url
// 所有申城的URI中都有这个基础路由文件
$di['url'] = function () {
	$url = new Url();
	$url->setBaseUri('/');
	return $url;
};

// 设置传递标签
$di['tag'] = function () {
	return new Tag();
};


$application = new Application($di);

	//处理请求
	$response = $application->handle();

	$response->send();
} catch (\Exception $e) {
	echo "出错啦：", $e->getMessage();
}
