<div class="events form">
<?php echo $this->Form->create('Event',array('url'=>"/group/$ggid/new_event"));?>
	<fieldset>
 		<legend><?php __("在{$group['Group']['name']}小组创建新活动"); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->hidden('group_id',array('value'=>$gid));
		echo $this->Form->input('begins');
		echo $this->Form->input('ends');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Events', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Event Users', true), array('controller' => 'event_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event User', true), array('controller' => 'event_users', 'action' => 'add')); ?> </li>
	</ul>
</div>