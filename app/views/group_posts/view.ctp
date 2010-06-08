<div class="groupPosts view">
<h2><?php  __('Group Post');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($groupPost['User']['username'], array('controller' => 'users', 'action' => 'view', $groupPost['User']['id'])); ?>
			&nbsp;
		</dd>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $groupPost['GroupPost']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Body'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $groupPost['GroupPost']['body']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $groupPost['GroupPost']['created']; ?>
			&nbsp;
		</dd>



		<?php echo $this->Html->link(__('修改', true), array('action' => 'edit', $groupPost['GroupPost']['id'])); ?>
		<?php echo $this->Html->link(__('删除', true), array('action' => 'delete', $groupPost['GroupPost']['id']), null, sprintf(__('确定删除吗?', true))); ?>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link("返回{$groupPost['Group']['name']}小组", "/group/{$groupPost['Group']['gid']}"); ?> </li>
	
	</ul>
</div>
