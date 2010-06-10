<div id="sidebar1">
<div id="name">
	<h2><?php __('我管理的小组dd') ?></h2>
	<?php foreach ($groups_admined as $group): ?>
		<?php echo $html->link($group['Group']['name'], "/group/{$group['Group']['gid']}") ?>
	<?php endforeach ?>
</div>
<div id="name">
	<h2><?php __('我加入的小组dd') ?></h2>
	<?php foreach ($groups_joined as $group): ?>
		<?php echo $html->link($group['Group']['name'], "/group/{$group['Group']['gid']}") ?>
	<?php endforeach ?>
</div>

<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('创建小组', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>

	</ul>
</div>
</div>




<div id="mainContent">

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
		<td><?php echo $this->Html->link(__($post['GroupPost']['title'], true), array('controller' => 'group_posts', 'action' => 'view', $post['GroupPost']['id'])); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($post['User']['username'], "/people/{$post['User']['uid']}"); ?>
		</td>
		<td><?php echo $post['GroupPost']['created']; ?>&nbsp;</td>

	</tr>
<?php endforeach; ?>
	</table>
</div><!--mainContent end-->
