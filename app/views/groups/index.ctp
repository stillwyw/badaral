<div class="right">
<div id="name">
	<h2><?php __('我管理的小组dd') ?></h2>
	<?php foreach ($groups_admined as $group): ?>
		<?php echo $avatar->groupLink($group) ?>
	<?php endforeach ?>
</div>
<div id="name">
	<h2><?php __('我加入的小组dd') ?></h2>
	<?php foreach ($groups_joined as $group): ?>
		<?php echo $avatar->groupLink($group) ?>
	<?php endforeach ?>
</div>

<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('创建小组', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>

	</ul>
</div>
</div>




<div class="left">

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
		<td> <?php echo $this->Html->link("{$post['Group']['name']}小组", "/group/{$post['Group']['gid']}"); ?></td>
		<td><?php echo $post['GroupPost']['created']; ?>&nbsp;</td>

	</tr>
<?php endforeach; ?>
	</table>
		<p>
	<?php
	$paginator->options(array('url' => $this->passedArgs));
	echo $this->Paginator->counter(array(
	'format' => __('第 %page% / %pages% 页,  %current% / %count% 条目, 第 %start%到 %end% 条', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div><!--mainContent end-->
