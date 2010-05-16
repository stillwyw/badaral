<div class="diaries index">
	<h2><?php __('Diaries');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($diaries as $diary):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $diary['Diary']['id']; ?>&nbsp;</td>
		<td><?php echo $diary['Diary']['name']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($diary['User']['username'], array('controller' => 'users', 'action' => 'view', $diary['User']['id'])); ?>
		</td>
		<td><?php echo $diary['Diary']['status']; ?>&nbsp;</td>
		<td><?php echo $diary['Diary']['created']; ?>&nbsp;</td>
		<td><?php echo $diary['Diary']['updated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $diary['Diary']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $diary['Diary']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $diary['Diary']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $diary['Diary']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Diary', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Diary Posts', true), array('controller' => 'diary_posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Diary Post', true), array('controller' => 'diary_posts', 'action' => 'add')); ?> </li>
	</ul>
</div>