<div class="notes view">
<h2><?php  __('Note');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $note['Note']['title']; ?>
			&nbsp;
		</dd>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $format->text($note['Note']['body']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $note['Note']['updated']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div>
	<table border="0" cellspacing="5" cellpadding="5">
	<?php
	$i = 0;
	foreach ($noteComments as $noteComment):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $noteComment['NoteComment']['id']; ?>&nbsp;</td>
		<td><?php echo $format->text($noteComment['NoteComment']['body']); ?>&nbsp;</td>
		<td><?php echo $noteComment['NoteComment']['created']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Avatar->userLink($noteComment['User']); ?>
		</td>

		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $noteComment['NoteComment']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $noteComment['NoteComment']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>

	</table>
	
	
	
	
</div>
<div class="noteComments form">
<?php echo $this->Form->create('NoteComment',array('url'=>'/note_comments/add'));?>
	<fieldset>
 		<legend><?php __('Add New Comment'); ?></legend>
	<?php
		echo $this->Form->input('body');
		echo $this->Form->hidden('user_id',array('value'=>$cuid));
		echo $this->Form->hidden('note_id',array('value'=>$note['Note']['id']));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('修改', true), array('action' => 'edit', $note['Note']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('删除', true), array('action' => 'delete', $note['Note']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $note['Note']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('返回日记', true), "/people/{$cuid}/diary"); ?> </li>
	</ul>
</div>
