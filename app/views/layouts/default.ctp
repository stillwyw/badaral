<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- TemplateBeginEditable name="doctitle" -->
<title><?php echo $title_for_layout?></title>
<link rel="stylesheet" href="/css/index.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="/css/common.css" type="text/css" media="screen" title="no title" charset="utf-8">

<?php echo $scripts_for_layout ?>
</head>
<body>
<div class="content">
  <div class="head">
    <div class="logo"><img src="/img/logo.gif" /></div>
    <div class="nav">
      <ul>
    	<li><?php echo $html->link('首页', '/') ?> </li>
    	<!--<li><?php echo $html->link('关于', '/about') ?> </li>	 -->
    	<li><?php echo $html->link('我的', '/mine') ?> </li>
    	<li><?php if(isset($current_user)){
			echo $html->link('日记', "/people/{$cuuid}/diary");
    	} ?> </li>
    	<li><?php echo $html->link('小组', '/groups') ?> </li>
    	<li><?php if(isset($current_user)){
    		echo $html->link($current_user['User']['username'].'设置', '/settings'); 
    		} ?> </li>
    	<li><?php echo $html->link('活动', '/events') ?></li>
    	<li><?php if(isset($current_user)){
    		echo $html->link('邮箱','/messages');
    		echo $html->link('退出', '/signout') ;
    		} ?> </li>
      </ul>
    </div>
  </div>
  <!---head-->
  <div id="content">
  	
  	  	<?php echo $content_for_layout ?>
  <div>  <!-- end content-->
  	<div style="clear:both;"></div>

  <!---end-->
</div>
<!---content-->
</body>

</html>
