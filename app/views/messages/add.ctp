<div class="messages form">
<?php echo $this->Form->create('Message');?>
	<fieldset>
 		<legend><?php __('发送邮件给'.$reciever['User']['username']); ?></legend>
	<?php
		echo $this->Form->hidden('sender_id',array('value'=>$cuid));
		echo $this->Form->hidden('user_id',array('value'=>$reciever['User']['id']));
		echo $this->Form->input('title');
		echo $this->Form->input('body');
	?>
	</fieldset>
<?php echo $this->Form->end(__('写好了', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('返回收件箱', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('返回发件箱', true), array( 'action' => 'outbox')); ?> </li>
	</ul>
</div>