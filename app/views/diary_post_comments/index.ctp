<div class="diaryPostComments index">
	<h2><?php __('Diary Post Comments');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('body');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('diary_post_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($diaryPostComments as $diaryPostComment):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $diaryPostComment['DiaryPostComment']['id']; ?>&nbsp;</td>
		<td><?php echo $diaryPostComment['DiaryPostComment']['body']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($diaryPostComment['User']['username'], array('controller' => 'users', 'action' => 'view', $diaryPostComment['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($diaryPostComment['DiaryPost']['title'], array('controller' => 'diary_posts', 'action' => 'view', $diaryPostComment['DiaryPost']['id'])); ?>
		</td>
		<td><?php echo $diaryPostComment['DiaryPostComment']['created']; ?>&nbsp;</td>
		<td><?php echo $diaryPostComment['DiaryPostComment']['updated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $diaryPostComment['DiaryPostComment']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $diaryPostComment['DiaryPostComment']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $diaryPostComment['DiaryPostComment']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $diaryPostComment['DiaryPostComment']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Diary Post Comment', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Diary Posts', true), array('controller' => 'diary_posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Diary Post', true), array('controller' => 'diary_posts', 'action' => 'add')); ?> </li>
	</ul>
</div>