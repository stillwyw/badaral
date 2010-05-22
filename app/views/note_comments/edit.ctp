<div class="noteComments form">
<?php echo $this->Form->create('NoteComment');?>
	<fieldset>
 		<legend><?php __('Edit Note Comment'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('body');
		echo $this->Form->input('user_id');
		echo $this->Form->input('note_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('NoteComment.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('NoteComment.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Note Comments', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Notes', true), array('controller' => 'notes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Note', true), array('controller' => 'notes', 'action' => 'add')); ?> </li>
	</ul>
</div>