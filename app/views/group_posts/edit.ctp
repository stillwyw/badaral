<div class="groupPosts form">
<?php echo $this->Form->create('GroupPost');?>
	<fieldset>
 		<legend><?php __('Edit Group Post'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('body');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
			<li><?php echo $this->Html->link("返回{$group['Group']['name']}小组", "/group/{$gid}"); ?> </li>
	</ul>
</div>