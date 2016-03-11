<?php
namespace Home\Model;
use Think\Model;
class MemberCourse extends Model {
    // 定义自动验证
    protected $_auto = array ( 
    	#增加减少可以自动完成，但是自动完成是在插入成功之后吗？
    	#插入的时候自动完成
    	#删除的时候
         
         array('select_time','date',1,'function'), // 对update_time字段在更新的时候写入当前时间戳
     );

 }
