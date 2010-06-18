<div class="followships form">
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend><?php __('Add Followship'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('uid');
		echo $this->Form->input('city_id');
		echo $this->Form->input('province_id');
		echo $this->Form->input('avatar');
		echo $this->Form->input('Group');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Followships', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Group Memberships', true), array('controller' => 'group_memberships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group Membership', true), array('controller' => 'group_memberships', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>