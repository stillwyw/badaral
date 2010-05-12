<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//utf8"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $title_for_layout?></title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<!-- Include external files and scripts here (See HTML helper for more info.) -->
<?php echo $scripts_for_layout ?>
</head>
<body>

<!-- If you'd like some sort of menu to 
show up on all of your views, include it here -->
<div id="header">
    <div id="menu">
    	<?php echo $html->link('首页', '/') ?> 
    	<?php echo $html->link('关于', '/about') ?>	 
    	<?php echo $html->link('我的', '/mine') ?>
    	
    </div>
    <p>
    	<?php echo $session->flash('auth') ?><p>
			<?php echo $session->flash() ?>
    	</p>
    
    
</div>

<!-- Here's where I want my views to be displayed -->
<?php echo $content_for_layout ?>

<!-- Add a footer to each displayed page -->
<div id="footer">...</div>

</body>
</html>
