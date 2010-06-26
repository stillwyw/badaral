<div class="languages form">
<?php echo $this->Form->create('Language');?>
	<fieldset>
 		<legend><?php __('Edit Language'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Language.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Language.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Languages', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Words', true), array('controller' => 'words', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Word', true), array('controller' => 'words', 'action' => 'add')); ?> </li>
	</ul>
</div>