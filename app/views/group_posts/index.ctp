<div class="groupPosts index">
	<h2><?php __('Group Posts');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('body');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo $this->Paginator->sort('privacy');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('group_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($groupPosts as $groupPost):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $groupPost['GroupPost']['id']; ?>&nbsp;</td>
		<td><?php echo $groupPost['GroupPost']['title']; ?>&nbsp;</td>
		<td><?php echo $groupPost['GroupPost']['body']; ?>&nbsp;</td>
		<td><?php echo $groupPost['GroupPost']['created']; ?>&nbsp;</td>
		<td><?php echo $groupPost['GroupPost']['modified']; ?>&nbsp;</td>
		<td><?php echo $groupPost['GroupPost']['status']; ?>&nbsp;</td>
		<td><?php echo $groupPost['GroupPost']['privacy']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($groupPost['User']['name'], array('controller' => 'users', 'action' => 'view', $groupPost['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($groupPost['Group']['name'], array('controller' => 'groups', 'action' => 'view', $groupPost['Group']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $groupPost['GroupPost']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $groupPost['GroupPost']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $groupPost['GroupPost']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $groupPost['GroupPost']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Group Post', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>