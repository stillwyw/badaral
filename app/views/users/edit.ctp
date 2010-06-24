<div class="left">
		<h2>用户设置</h2>
		    <?php echo $session->flash() ?>

	<?php echo $this->Form->create('User',array('url'=>'/settings'));?>
	
	<table border="0" cellspacing="5" cellpadding="5">
		<tr><td>称号：</td><td><?php echo $this->Form->text('username') ?></td></tr>
		<tr><td>用户id：</td><td>
			<?php if ($this->data['User']['uid']=="u{$this->data['User']['id']}"): ?>
				<?php echo $this->Form->text('uid',array('value'=>'')) ?> （用户id为用户唯一标识，一旦设置便不能更改。）
				<?php else: ?>
					<?php echo $cuuid ?>
			<?php endif ?>
		</td></tr>
		<tr><td>登录邮箱：</td><td>更改</td></tr>
		<tr><td>密码：</td><td>更改</td></tr>
		<tr><td>头像：</td><td>
			<?php echo $this->Avatar->userAvatar($current_user['User']) ?>
			<?php echo $html->link('更改', '/users/upload_avatar') ?>
		</td></tr>
		<tr><td><?php echo $this->Form->end(__('Submit', true));?>
	</td><td></td></tr>
	</table>
</div>

<div class="right">
	<h3><?php __('其他设置'); ?></h3>
	<ul>

	</ul>
</div>