




<div class="posts index">

	<h2><?php __('小组最近更新');?></h2>

	<table cellpadding="0" cellspacing="0">
	<?php
	$i = 0;
	foreach ($posts as $post):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $post['GroupPost']['id']; ?>&nbsp;</td>
		<td><?php echo $post['GroupPost']['title']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($post['User']['username'], array('controller' => 'users', 'action' => 'view', $post['User']['uid'])); ?>
		</td>
		<td><?php echo $post['GroupPost']['created']; ?>&nbsp;</td>
		<td><?php echo $post['GroupPost']['updated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $post['GroupPost']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $post['GroupPost']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $post['GroupPost']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $post['GroupPost']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
<div id="name">
	<h2><?php __('我管理的小组dd') ?></h2>
	<?php foreach ($groups_admined as $group): ?>
		<?php echo $html->link($group['Group']['name'], array('controller'=>'groups','action'=>'view',$group['Group']['gid'])) ?>
	<?php endforeach ?>
</div>
<div id="name">
	<h2><?php __('我加入的小组dd') ?></h2>
	<?php foreach ($groups_joined as $group): ?>
		<?php echo $html->link($group['Group']['name'], array('controller'=>'groups','action'=>'view',$group['Group']['gid'])) ?>
	<?php endforeach ?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('创建小组', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>

	</ul>
</div>