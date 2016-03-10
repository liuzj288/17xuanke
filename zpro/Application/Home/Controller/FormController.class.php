<?php
namespace Home\Controller;
use Think\Controller;
class FormController extends Controller{
	function insert(){
		$form = D('Form');
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
}