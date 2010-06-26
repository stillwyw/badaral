<div class="languages view">
<h2><?php  __('Language');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $language['Language']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $language['Language']['name']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Language', true), array('action' => 'edit', $language['Language']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Language', true), array('action' => 'delete', $language['Language']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $language['Language']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Languages', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Language', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Words', true), array('controller' => 'words', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Word', true), array('controller' => 'words', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Words');?></h3>
	<?php if (!empty($language['Word'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Word'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Updated'); ?></th>
		<th><?php __('Language Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($language['Word'] as $word):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $word['id'];?></td>
			<td><?php echo $word['word'];?></td>
			<td><?php echo $word['description'];?></td>
			<td><?php echo $word['user_id'];?></td>
			<td><?php echo $word['created'];?></td>
			<td><?php echo $word['updated'];?></td>
			<td><?php echo $word['language_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'words', 'action' => 'view', $word['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'words', 'action' => 'edit', $word['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'words', 'action' => 'delete', $word['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $word['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Word', true), array('controller' => 'words', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
