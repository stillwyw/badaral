<div class="diaries form">
<?php echo $this->Form->create('Diary');?>
	<fieldset>
 		<legend><?php __('Add Diary'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('user_id');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Diaries', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Diary Posts', true), array('controller' => 'diary_posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Diary Post', true), array('controller' => 'diary_posts', 'action' => 'add')); ?> </li>
	</ul>
</div>