<?php

use Phalcon\Mvc\Controller;

/**
 * Class SignupController
 */
class SignupController extends Controller
{
	/**
	 * 返回默认视图
	 */
	public function indexAction()
	{

	}

	/**
	 * 注册视图页面
	 * 对结果进行判断
	 * 如果数据库返回响应则说明注册成功 否则注册失败
	 */
	public function registerAction()
	{

		$user = new Users();

		$rst = $user->save(
			$this->request->getPost(),
			array('name', 'email')
		);

		if ($rst) {
			echo "恭喜你注册成功！";
		} else {
			echo "注册失败！";
			foreach ($user->getMessages() as $message) {
				echo $message->getMessage(), "<br />";
			}
		}

		$this->view->disable();

	}

}