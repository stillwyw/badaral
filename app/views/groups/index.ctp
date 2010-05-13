

<?php echo $username ?>



<div class="groups index">
	<h2><?php __('我的小组');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('desc');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modifed');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo $this->Paginator->sort('privacy');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($group_posts as $group_post):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $group_post['Group']['id']; ?>&nbsp;</td>
		<td><?php echo $group_post['Group']['name']; ?>&nbsp;</td>
		<td><?php echo $group_post['Group']['desc']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($group_post['User']['username'], array('controller' => 'users', 'action' => 'view', $group_post['User']['id'])); ?>
		</td>
		<td><?php echo $group_post['Group']['created']; ?>&nbsp;</td>
		<td><?php echo $group_post['Group']['updated']; ?>&nbsp;</td>
		<td><?php echo $group_post['Group']['status']; ?>&nbsp;</td>
		<td><?php echo $group_post['Group']['privacy']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $group_post['Group']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $group_post['Group']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $group_post['Group']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $group_post['Group']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Group', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Group Posts', true), array('controller' => 'group_posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group Post', true), array('controller' => 'group_posts', 'action' => 'add')); ?> </li>
	</ul>
</div>