<div class="words index">
	<h2><?php __('Words');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('word');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th><?php echo $this->Paginator->sort('language');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($words as $word):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $word['Word']['id']; ?>&nbsp;</td>
		<td><?php echo $word['Word']['word']; ?>&nbsp;</td>
		<td><?php echo $word['Word']['description']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($word['User']['username'], array('controller' => 'users', 'action' => 'view', $word['User']['id'])); ?>
		</td>
		<td><?php echo $word['Word']['created']; ?>&nbsp;</td>
		<td><?php echo $word['Word']['updated']; ?>&nbsp;</td>
		<td><?php echo $word['Word']['language']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $word['Word']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $word['Word']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $word['Word']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $word['Word']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Word', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>