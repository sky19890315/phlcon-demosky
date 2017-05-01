<?php

use Phalcon\Di\FactoryDefault;
use Phalcon\Loder;

//Register an autoloder
$loder = new Loder();
$loder->registerDirs(
	[
		'../app/controlles/',
		'../app/models/',
	]);

$loder->register();

//Create DI
//Phalcon\Di\FactoryDefault 是 Phalcon\Di 的一个变体。为了让事情变得更容易，它已注册了Phalcon的大多数组件。 因此，我们不需要一个一个注册这些组件。在以后更换工厂服务的时候也不会有什么问题。
$di = new FactoryDefault();
