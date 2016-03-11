<?php


namespace Home\Controller;
#hhh
use Think\Controller;
class IndexController extends Controller {
    public function _initialize(){
       # session(array('expire'=>15));
          if (!isset($_SESSION['username'])){
            $this->error('请先登录',U('Member/login'));
        }
      }
    public function index($name = 'thinkphp'){
    	if (!isset($_SESSION['username'])){
    		echo "<script>window.location.href='index.php/home/member/login/';</script>";
    	}else{
    		$this->assign('name',$name);
	    	$data = D('Course');
	    	$result = $data -> select();
	    	$this -> assign('result',$result);

            $select_course = M('member_course') -> where('member_id='.$_SESSION['uid'])->getField('course_id');
           // var_dump($select_course);
            if($select_course){
                $this->assign('no_select',"1"); 
                $this->assign('select_course',$select_course);   
           }else{
                $this->assign('no_select',"-1"); 
              #  $this->assign'select_course','False');
           }
          
	    	$this->display();
    	}
    	
       
    }

    
    public function select($id){
       
        $course = D('course');
        $course_id['id'] = $id;
        $result = $course-> where($course_id) -> find();   #根据课程id查找相关信息
        #可以直接写成getField
        #用count函数来统计选课人数
        #如果还可以选择
        if($result['totallimit'] - $result['selected'] >0){
			$class = M('Member')->where($course_id)->getField('class');			
            $s['class'] = $class;            $s['course_id'] = $id;            
            $classlimit =$course->where($course_id)->getField('classlimit');
            $num = M('member_course') ->where($s) -> count();
			#如果classlimit是0，说明不限制
            if ($classlimit && $num >= $classlimit ){
                $this->error('抱歉，你们班级名额已满');
            }
            $select = M('member_course');
           
            
            $data['member_id'] = session('uid');
            $data['course_id'] = $result['id'];       
            $data['class'] = M('member') -> where('uid='.$_SESSION['uid'])->getField('class');
            $data['select_time'] = date('Y-m-d H:i:s');

            M('course')->startTrans();           

            $selectResult = $select->add($data);

            M('course')->where('id='.$id)->setInc('selected');
            $incResult = M('course')->where($course_id)->save();

            if($selectResult){
                $select->commit();
            }else{
                $select->rollback();
            }
            $this->success('恭喜你选课成功',U('Index/index'));
   
          
         }else{
            $this->error('亲，你来晚了，呜哈哈哈哈哈');
         }

    	

    }
    public function unselect($id){
        $diselect['member_id'] = session('uid');
        $diselect['course_id'] = $id;    
        $select = D('course');        
        $select->where('id='.$id)->save();
        $select->startTrans();
        $result = M('member_course')->where($diselect)->delete();
        if($result){
            $select->commit();
            $select->where('id='.$id)->setDec('selected');
            $select->where('id='.$id)->save();
            $this->success('退选成功，请选择其他课程...');
        }else{
           $select->rollback();
           $this->error('退选失败');
        }
    }
    



}
