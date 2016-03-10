<?php 
namespace Admin\Controller;
use Think\Controller;
class CourseController extends Controller{
	public function index(){

		$data = D('Course') -> select();
		$this -> assign('list',$data);
		var_dump($data);
		$this -> display();

	}

	public function insert(){
		$form = D('Course');
		if ( $form -> create()){
			$result = $form -> add();

			if ( $result ){
				$this -> success('Successfully added!');
			}else{
				$this -> error('Failed added!');
			}

		}else{
			$this->error($form->getError());
		}
	}
	public function edit($id=0){
		$form = M('Course');
		$this -> assign('vo', $form -> find($id));
		$this -> display();

	}
	public function update(){
    $Form   =   D('Course');
    if($Form->create()) {
        $result =   $Form->save();
        if($result) {
            $this->success('操作成功！');
        }else{
            $this->error('写入错误！');
        }
    }else{
        $this->error($Form->getError());
    }
 	}
}
?>