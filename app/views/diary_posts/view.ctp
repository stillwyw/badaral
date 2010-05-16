<div class="diaryPosts view">
<h2><?php  __('Diary Post');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $diaryPost['DiaryPost']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $diaryPost['DiaryPost']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Body'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $diaryPost['DiaryPost']['body']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Diary'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($diaryPost['Diary']['name'], array('controller' => 'diaries', 'action' => 'view', $diaryPost['Diary']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($diaryPost['User']['username'], array('controller' => 'users', 'action' => 'view', $diaryPost['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $diaryPost['DiaryPost']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $diaryPost['DiaryPost']['updated']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Diary Post', true), array('action' => 'edit', $diaryPost['DiaryPost']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Diary Post', true), array('action' => 'delete', $diaryPost['DiaryPost']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $diaryPost['DiaryPost']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Diary Posts', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Diary Post', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Diaries', true), array('controller' => 'diaries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Diary', true), array('controller' => 'diaries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Diary Post Comments', true), array('controller' => 'diary_post_comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Diary Post Comment', true), array('controller' => 'diary_post_comments', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Diary Post Comments');?></h3>
	<?php if (!empty($diaryPost['DiaryPostComment'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Body'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Diary Post Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Updated'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($diaryPost['DiaryPostComment'] as $diaryPostComment):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $diaryPostComment['id'];?></td>
			<td><?php echo $diaryPostComment['body'];?></td>
			<td><?php echo $diaryPostComment['user_id'];?></td>
			<td><?php echo $diaryPostComment['diary_post_id'];?></td>
			<td><?php echo $diaryPostComment['created'];?></td>
			<td><?php echo $diaryPostComment['updated'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'diary_post_comments', 'action' => 'view', $diaryPostComment['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'diary_post_comments', 'action' => 'edit', $diaryPostComment['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'diary_post_comments', 'action' => 'delete', $diaryPostComment['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $diaryPostComment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Diary Post Comment', true), array('controller' => 'diary_post_comments', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
