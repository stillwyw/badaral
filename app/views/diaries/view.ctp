<div class="diaries view">
<h2><?php  __('Diary');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $diary['Diary']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $diary['Diary']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($diary['User']['username'], array('controller' => 'users', 'action' => 'view', $diary['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $diary['Diary']['status']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $diary['Diary']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $diary['Diary']['updated']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Diary', true), array('action' => 'edit', $diary['Diary']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Diary', true), array('action' => 'delete', $diary['Diary']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $diary['Diary']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Diaries', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Diary', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Diary Posts', true), array('controller' => 'diary_posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Diary Post', true), array('controller' => 'diary_posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Diary Posts');?></h3>
	<?php if (!empty($diary['DiaryPost'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Body'); ?></th>
		<th><?php __('Diary Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Updated'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($diary['DiaryPost'] as $diaryPost):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $diaryPost['id'];?></td>
			<td><?php echo $diaryPost['title'];?></td>
			<td><?php echo $diaryPost['body'];?></td>
			<td><?php echo $diaryPost['diary_id'];?></td>
			<td><?php echo $diaryPost['user_id'];?></td>
			<td><?php echo $diaryPost['created'];?></td>
			<td><?php echo $diaryPost['updated'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'diary_posts', 'action' => 'view', $diaryPost['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'diary_posts', 'action' => 'edit', $diaryPost['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'diary_posts', 'action' => 'delete', $diaryPost['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $diaryPost['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Diary Post', true), array('controller' => 'diary_posts', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
