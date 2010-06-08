<?php echo $session->flash() ?>
<h1><?php echo 'Welcom to blahblah' ?></h1>
<p>
<?php echo $html->link('注册', '/signup') ?>
</p>
<?php echo $html->link('登录', '/signin' )?>