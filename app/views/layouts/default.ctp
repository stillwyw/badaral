<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- TemplateBeginEditable name="doctitle" -->
<title><?php echo $title_for_layout?></title>
<link rel="stylesheet" href="/css/site.css" type="text/css" media="screen" title="no title" charset="utf-8">
<?php echo $scripts_for_layout ?>
</head>

<body class="twoColFixRtHdr">

<div id="container">
  <div id="header">
<h1>待定</h1>
 <div id="menu">
 	    &nbsp;&nbsp;&nbsp;&nbsp;
    	<?php echo $html->link('首页', '/') ?> 
    	&nbsp;&nbsp;&nbsp;&nbsp;
    	<?php echo $html->link('关于', '/about') ?>	 
    	&nbsp;&nbsp;&nbsp;&nbsp;
    	<?php echo $html->link('我的', '/mine') ?>
    	&nbsp;&nbsp;&nbsp;&nbsp;
    	<?php if(isset($current_user)){
			echo $html->link('日记', "/people/{$current_user['User']['uid']}/diary");
    	} ?>
    	&nbsp;&nbsp;&nbsp;&nbsp;
    	<?php echo $html->link('小组', '/groups') ?>
    	&nbsp;&nbsp;&nbsp;&nbsp;
    	<?php if(isset($current_user)){
    		echo $html->link($current_user['User']['username'], '/settings'); 
    		} ?>
    		&nbsp;&nbsp;&nbsp;&nbsp;
    	<?php if(isset($current_user)){
    		echo $html->link('退出', '/signout') ;
    		} ?>
    </div>

  
  </div><!-- end #header -->

  	<?php echo $content_for_layout ?>
  	
  	

	<!-- end #mainContent -->
	<!-- 这个用于清除浮动的元素应当紧跟 #mainContent div 之后，以便强制 #container div 包含所有的子浮动 --><br class="clearfloat" />
  <div id="footer">
<p>脚注</p>
  <!-- end #footer --></div>
<!-- end #container -->
</div>
</body>
</html>
