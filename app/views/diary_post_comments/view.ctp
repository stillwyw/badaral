<div class="diaryPostComments view">
<h2><?php  __('Diary Post Comment');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $diaryPostComment['DiaryPostComment']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Body'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $diaryPostComment['DiaryPostComment']['body']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($diaryPostComment['User']['username'], array('controller' => 'users', 'action' => 'view', $diaryPostComment['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Diary Post'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($diaryPostComment['DiaryPost']['title'], array('controller' => 'diary_posts', 'action' => 'view', $diaryPostComment['DiaryPost']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $diaryPostComment['DiaryPostComment']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $diaryPostComment['DiaryPostComment']['updated']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Diary Post Comment', true), array('action' => 'edit', $diaryPostComment['DiaryPostComment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Diary Post Comment', true), array('action' => 'delete', $diaryPostComment['DiaryPostComment']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $diaryPostComment['DiaryPostComment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Diary Post Comments', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Diary Post Comment', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Diary Posts', true), array('controller' => 'diary_posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Diary Post', true), array('controller' => 'diary_posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
