<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../favicon.ico"> -->

    <title>选修课</title>

    <!-- Bootstrap core CSS -->

<link rel="stylesheet" href="/zpro/Public/css/bootstrap.min.css">





    <!-- Custom styles for this template -->
    <link href="/zpro/Public/css/jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/zpro/Public/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

	<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">青岛十七中选课</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="#">首页 <span class="sr-only">(current)</span></a></li>
        
      
      </ul>
    
      <ul class="nav navbar-nav navbar-right">
        
        <li><a href="#">您好，亲爱的<?php echo (session('username')); ?>同学</a></li>
 <li><a href="<?php echo U('Member/logout');?>">退出</a></li>
       
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	
		
<p>
热爱编程的同学请加群536466362，诸如web/php/html/js/python/c/asp.net/linux/ubuntu.
</p>

<form action="/zpro/index.php/Home/Index/select" method="post">
	<table class="table .table-condensed">
			<thead>
					<tr>
						<th>
							序号
						</th>
						<th>
							选修课名称
						</th>
						<th>
							说明
						</th>
						
						<th>
							已选 / 剩余
						</th>
						<th>
							授课教师
						</th>
						<th>
							备注
						</th>
						<th>
							操作
						</th>

					</tr>
				</thead>
				<tbody>
	
		<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($no_select) == "-1"): ?><tr class='info'>
		<td><?php echo ($i); ?></td>
		<td><?php echo ($vo["coursename"]); ?></td>
		<td><?php echo (mb_substr($vo["coursedes"],0,10,'utf-8')); ?>...</td>
		<td>&nbsp;&nbsp;<?php echo ($vo["selected"]); ?>/&nbsp;&nbsp;<?php echo ($vo["totallimit"]); ?></td>
		<td><?php echo (mb_substr($vo["teacher_name"],0,4,'utf-8')); ?></td>
		<td><?php echo ($vo["remark"]); ?></td>

		<!-- <td><a href="/zpro/index.php/Home/Index/edit/id/<?php echo ($vo["id"]); ?>">修改</a></td> -->
		<td><a href="/zpro/index.php/Home/Index/select/id/<?php echo ($vo["id"]); ?>">选课</a>					
		</td>
		<td>
		<!-- <a href="/zpro/index.php/Home/Index/unselect/id/<?php echo ($vo["id"]); ?>">退课</a>					 -->
		</td>

	</tr>
<?php else: ?>
<?php if(($vo["id"]) == $select_course): ?><tr class="warning">
				<td><?php echo ($i); ?></td>
				<td><?php echo ($vo["coursename"]); ?></td>
				<td><?php echo (mb_substr($vo["coursedes"],0,10,'utf-8')); ?>...</td>
				<!-- <td><a href="/zpro/index.php/Home/Index/edit/id/<?php echo ($vo["id"]); ?>">修改</a></td> -->
				<!-- <td>
				<a href="/zpro/index.php/Home/Index/select/id/<?php echo ($vo["id"]); ?>">选课</a>					
				</td> --><td>&nbsp;&nbsp;<?php echo ($vo["selected"]); ?>/&nbsp;&nbsp;<?php echo ($vo["totallimit"]); ?></td>
		<td><?php echo (mb_substr($vo["teacher_name"],0,4,'utf-8')); ?></td>
		<td><?php echo ($vo["remark"]); ?></td>
				<td>
				<a href="/zpro/index.php/Home/Index/unselect/id/<?php echo ($vo["id"]); ?>">退课</a>		
		
					
				</td>

			</tr>
		<?php else: ?>
		<tr class='info'>
				<td><?php echo ($i); ?></td>
				<td><?php echo ($vo["coursename"]); ?></td>
				<td><?php echo (mb_substr($vo["coursedes"],0,10,'utf-8')); ?>...</td>
				<!-- <td><a href="/zpro/index.php/Home/Index/edit/id/<?php echo ($vo["id"]); ?>">修改</a></td> -->	<td>&nbsp;&nbsp;<?php echo ($vo["selected"]); ?>/&nbsp;&nbsp;<?php echo ($vo["totallimit"]); ?></td>
		<td><?php echo (mb_substr($vo["teacher_name"],0,4,'utf-8')); ?></td>
		<td><?php echo ($vo["remark"]); ?></td>
				<td>
				选课
					<!-- <a href="/zpro/index.php/Home/Index/select/id/<?php echo ($vo["id"]); ?>">选课</a>					 -->
				</td>
	
		
			<!-- 	<td><a href="/zpro/index.php/Home/Index/unselect/id/<?php echo ($vo["id"]); ?>">退课</a>					
				</td> -->

			</tr><?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
		<tbody>
	</table>
	
</form>
	</div>
	</div>
	</div>
	</body>

<div class="container">
            <footer class="footer">
            <p class="pull-right"><a href="#">返回顶部</a></p>
            <p>小错误导致大麻烦。关于选课系统的任何问题请加群536466362。</p>
            <p>版权声明： <a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>.</p>
            </footer>
        </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="/zpro/Public/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/zpro/Public/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>


<!-- 可选的Bootstrap主题文件（一般不用引入） -->
<link rel="stylesheet" href="/zpro/Public/css/bootstrap-theme.min.css">

<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->