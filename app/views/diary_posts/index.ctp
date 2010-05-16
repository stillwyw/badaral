<div class="diaryPosts index">
	<h2><?php __('Diary Posts');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('body');?></th>
			<th><?php echo $this->Paginator->sort('diary_id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($diaryPosts as $diaryPost):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $diaryPost['DiaryPost']['id']; ?>&nbsp;</td>
		<td><?php echo $diaryPost['DiaryPost']['title']; ?>&nbsp;</td>
		<td><?php echo $diaryPost['DiaryPost']['body']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($diaryPost['Diary']['name'], array('controller' => 'diaries', 'action' => 'view', $diaryPost['Diary']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($diaryPost['User']['username'], array('controller' => 'users', 'action' => 'view', $diaryPost['User']['id'])); ?>
		</td>
		<td><?php echo $diaryPost['DiaryPost']['created']; ?>&nbsp;</td>
		<td><?php echo $diaryPost['DiaryPost']['updated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $diaryPost['DiaryPost']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $diaryPost['DiaryPost']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $diaryPost['DiaryPost']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $diaryPost['DiaryPost']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Diary Post', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Diaries', true), array('controller' => 'diaries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Diary', true), array('controller' => 'diaries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Diary Post Comments', true), array('controller' => 'diary_post_comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Diary Post Comment', true), array('controller' => 'diary_post_comments', 'action' => 'add')); ?> </li>
	</ul>
</div>