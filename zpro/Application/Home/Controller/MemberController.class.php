<?php
namespace Home\Controller;
use Think\Controller;
class MemberController extends Controller {

	public function login(){

		if(!IS_POST){
			$this->display();
		}else{
			$login = D('Member');

			if(!$data = $login->create()){
				$this->error($login->getError());
			}

			$where = array();

			$where['username'] = $data['username'];

			$result = $login->where($where) -> field('uid,username,passwd') -> find();
			#var_dump($result);

			if($result && $result['passwd'] == md5($data['passwd'])){
				session('uid',$result['uid']);
				session('username',$result['username']);
				#session('uid',$result['uid']);
				$this->success('登陆成功，正在跳转到选课界面...', U('Index/index'));
				#$this->redirect('/home/index/index');
				#$this->success('登陆成功，正在跳转到主页...','index.php/home/index/index');

			}else{
				$this->error('登录失败,用户名或密码不正确!');
			}
		}
		
	}
	public function logout(){
		session(null);
		redirect(U('Member/login'));
		
	}

}
