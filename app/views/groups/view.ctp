<div class="groups view">
<h2><?php  __('Group');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>

		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<h3><?php echo $group['Group']['name'] ,'小组'; ?></h3> 创建于：<?php echo $group['Group']['created']; ?>
			&nbsp;
		</dd>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $group['Group']['desc']; ?>
			&nbsp;
		</dd>

<!--要显示是谁创建的 -->



		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $group['Group']['status']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Privacy'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $group['Group']['privacy']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('小组管理', true), array('action' => 'edit', $group['Group']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Group', true), array('action' => 'delete', $group['Group']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $group['Group']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('返回我的小组', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('添加新讨论', true), array('controller' => 'group_posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Group Posts');?></h3>
	<?php if (!empty($group['GroupPost'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('标题'); ?></th>
		<th><?php __('发表时间'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php echo $html->link('Link Title', '/controller/action') ?>
	<?php
		$i = 0;
		foreach ($posts as $groupPost):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $this->Html->link(__($groupPost['GroupPost']['title'], true), array('controller' => 'group_posts', 'action' => 'view', $groupPost['GroupPost']['id'])); ?>
</td>
			<td><?php echo $groupPost['GroupPost']['created'];?></td>
			<td><?php echo $this->Html->link($groupPost['User']['username'],"/people/{$groupPost['User']['uid']}");?></td>
			<td class="actions">
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Group Post', true), array('controller' => 'group_posts', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
