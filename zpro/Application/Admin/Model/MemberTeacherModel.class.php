<?php
namespace Admin\Model;
use Think\Model;
class MemberTeacherModel extends Model{
	protected $_validate    =   array(
        array('username','require','员工号必须填写'),
       # array('username','number','员工号必须是数字'),

        array('passwd','require','密码必须'),

        );
}
?>