<div class="guests form">
<?php echo $this->Form->create('Guest');?>
	<fieldset>
 		<legend><?php __('Edit Guest'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('sender_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('body');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Guest.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Guest.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Guests', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>