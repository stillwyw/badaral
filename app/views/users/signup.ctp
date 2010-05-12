<?php echo $form->create('User') ?>  
<?php echo $form->text('email') ?>
<?php echo $form->text('username',array('size'=>'3')) ?>
<?php echo $form->text('password') ?>
<?php echo $form->text('password_confirm') ?>
<?php echo $form->submit('signup') ?>