<?php echo $session->flash() ?>
<?php if (isset($smtp_errors)): ?>
<?php echo $smtp_errors ?>
<?php endif ?>
Welcome! <?php echo  $current_user['User']['username'] ?>
<p>
欢迎回来！
</p>

<?php echo $html->link('登出', array('controller' => 'users','action'=>'logout')) ?>