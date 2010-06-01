




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
		<td><?php echo $post['GroupPost']['body']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($post['User']['username'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
		</td>
		<td><?php echo $post['GroupPost']['created']; ?>&nbsp;</td>
		<td><?php echo $post['GroupPost']['updated']; ?>&nbsp;</td>
		<td><?php echo $post['GroupPost']['status']; ?>&nbsp;</td>
		<td><?php echo $post['GroupPost']['privacy']; ?>&nbsp;</td>
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
	<h2><?php __('我加入的小组') ?></h2>
	<?php foreach ($groups as $group): ?>
		<?php echo $html->link($group['Group']['name'], '/groups/view/'+$group['Group']['id']) ?>
	<?php endforeach ?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New post', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List post Posts', true), array('controller' => 'post_posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New post Post', true), array('controller' => 'post_posts', 'action' => 'add')); ?> </li>
	</ul>
</div>