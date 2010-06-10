<div class="notes index">
	<h2><?php __('Notes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<?php
	$i = 0;
	foreach ($notes as $note):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $note['Note']['title']; ?>&nbsp;</td>
		<td><?php echo $note['Note']['body']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($note['User']['username'], array('controller' => 'users', 'action' => 'view', $note['User']['id'])); ?>
		</td>
		<td><?php echo $note['Note']['status']; ?>&nbsp;</td>
		<td><?php echo $note['Note']['created']; ?>&nbsp;</td>
		<td><?php echo $note['Note']['updated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $note['Note']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $note['Note']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $note['Note']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $note['Note']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	$paginator->options(array('url' => "../../people/{$uid}/diary"));
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array("/people/{$current_user['User']['uid']}/diary"), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array("/people/{$current_user['User']['uid']}/diary"), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<?php if ($own): ?>
		<li><?php echo $this->Html->link(__('添加新日记', true), array('action' => 'add')); ?></li>
			
		<?php endif ?>
	</ul>
</div>