<div class="groups form">
<?php echo $this->Form->create('Group');?>
	<fieldset>
 		<legend><?php __('Add Group'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('desc');
		echo $this->Form->input('user_id');
		echo $this->Form->input('modifed');
		echo $this->Form->input('status');
		echo $this->Form->input('privacy');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Groups', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Group Posts', true), array('controller' => 'group_posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group Post', true), array('controller' => 'group_posts', 'action' => 'add')); ?> </li>
	</ul>
</div>