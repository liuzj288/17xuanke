<?php
namespace Home\Model;
use Think\Model\RelationModel;
class MemberModel extends RelationModel {
    // 定义自动验证
    protected $_validate    =   array(
        array('username','require','必须输入姓名'),
        array('passwd','require','身份证后六位 嘻嘻……'),

        );
    // 定义自动完成
    protected $_auto    =   array(
        array('create_time','time',1,'function'),
        );
 }
