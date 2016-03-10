<?php
namespace Admin\Controller;
use Think\Controller;
class MemberTeacherController extends Controller {
    public function index(){
        $this->show();
    }
    public function login(){
		if(!IS_POST){
			$this->display();
		}else{
			
			$login = D('MemberTeacher');

			if(!$data = $login->create()){
				$this->error($login->getError());
			}

			$where = array();

			$where['username'] = $data['username'];

			$result = $login->where($where) -> field('uid,username,passwd') -> find();

			if($result && $result['passwd'] == md5($data['passwd'])){

				session('admin-uid',$result['uid']);
				session('username',$result['username']);
				#session('uid',$result['uid']);
				$this->success('登陆成功，正在跳转到管理界面...', U('Course/index'));
				#$this->redirect('/home/index/index');
				#$this->success('登陆成功，正在跳转到主页...','index.php/home/index/index');

			}else{
				$this->error('登录失败,用户名或密码不正确!');
			}
		}
		
	}
	public function logout(){
		session(null);
		redirect(U('MemberTeacher/login'));
		
	}
}