<?php
namespace Admin\Model;
use Think\Model;
class CourseModel extends Model{
	protected $_validate    =   array(
        array('coursename','require','课程名称必须'),
        array('coursedes','require','简介必须啊老弟'),

        );
}
?>