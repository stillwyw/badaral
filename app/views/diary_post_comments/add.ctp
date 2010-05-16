<div class="diaryPostComments form">
<?php echo $this->Form->create('DiaryPostComment');?>
	<fieldset>
 		<legend><?php __('Add Diary Post Comment'); ?></legend>
	<?php
		echo $this->Form->input('body');
		echo $this->Form->input('user_id');
		echo $this->Form->input('diary_post_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Diary Post Comments', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Diary Posts', true), array('controller' => 'diary_posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Diary Post', true), array('controller' => 'diary_posts', 'action' => 'add')); ?> </li>
	</ul>
</div>