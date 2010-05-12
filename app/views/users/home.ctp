Welcome! <?php echo  $user['User']['username'] ?>
<p>
欢迎回来！
</p>

<?php echo $html->link('登出', array('controller' => 'users','action'=>'logout')) ?>