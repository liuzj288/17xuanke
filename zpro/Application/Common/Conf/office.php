<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE'=>'mysql',// 数据库类型
	'DB_HOST'=>'127.0.0.1',// 服务器地址
	'DB_NAME'=>'xuanke',// 数据库名
	'DB_USER'=>'root',// 用户名
	'DB_PWD'=>'langxm',// 密码
	'DB_PORT'=>3306,// 端口
	'DB_PREFIX'=>'think_',// 数据库表前缀
	'DB_CHARSET'=>'utf8',// 数据库字符集
	'LAYOUT_ON'=>true,
	'LAYOUT_NAME'=>'layout',
	
	#'SHOW_PAGE_TRACE'=>True,
	'SESSION_OPTIONS'         =>  array(
     #   'name'                =>  'BJYSESSION',                    //设置session名
        'expire'              =>  2400,                      //SESSION保存15天
       # 'use_trans_sid'       =>  1,                               //跨页传递
       # 'use_only_cookies'    =>  0,                               //是否只开启基于cookies的session的会话方式
    ),
);
