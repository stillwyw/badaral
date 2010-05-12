<?php echo $session->flash('auth') ?><p>
<?php echo $session->flash() ?>
<?php echo $form->create('User') ?>
邮箱：<?php echo $form->text('email') ?><br>
密码：<?php echo $form->password('password') ?><br>
<?php echo $form->submit('登录') ?>