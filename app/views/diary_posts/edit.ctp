<div class="diaryPosts form">
<?php echo $this->Form->create('DiaryPost');?>
	<fieldset>
 		<legend><?php __('Edit Diary Post'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('body');
		echo $this->Form->input('diary_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('DiaryPost.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('DiaryPost.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Diary Posts', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Diaries', true), array('controller' => 'diaries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Diary', true), array('controller' => 'diaries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Diary Post Comments', true), array('controller' => 'diary_post_comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Diary Post Comment', true), array('controller' => 'diary_post_comments', 'action' => 'add')); ?> </li>
	</ul>
</div>