
<?php echo $form->create('User') ?>
邮箱：<?php echo $form->text('email') ?><br>
密码：<?php echo $form->password('password') ?><br>
<?php echo $form->checkbox('remember_me') ?> 记住登录状态，2周不用再登录
<?php echo $form->submit('登录') ?>