
<?php echo $session->flash() ?>
<?php echo $form->create('User') ?>  
登录邮箱：<?php echo $form->text('email') ?> <?php echo $form->error('User.email', '') ?>   <br/>
	
登陆密码：<?php echo $form->password('password') ?> <br/>
重复密码：<?php echo $form->password('password_confirm') ?>  <br/>
给自己设置个名字吧：<?php echo $form->text('username',array('size'=>'3')) ?>  <br/>

<?php echo $form->submit('注册') ?>