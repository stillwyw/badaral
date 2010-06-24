<div class="left">
<h2><?php  __('');?></h2>
<?php echo $avatar->userLink($message['Sender']) ?>  >> <?php echo $avatar->userLink($message['User']) ?><p/>
<?php echo $message['Message']['title'] ?><p/>
<?php echo $format->text($message['Message']['body']) ?><p/>
</div>
<div class="right">
	<h3><?php __(''); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('收件箱', true), "/messages"); ?> </li>
		<li><?php echo $this->Html->link(__('发件箱', true), "/messages/outbox"); ?> </li>
	</ul>
</div>