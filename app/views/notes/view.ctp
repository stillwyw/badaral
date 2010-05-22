<div class="notes view">
<h2><?php  __('Note');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $note['Note']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $note['Note']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Body'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $note['Note']['body']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($note['User']['username'], array('controller' => 'users', 'action' => 'view', $note['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $note['Note']['status']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $note['Note']['created']; ?>
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
		<td><?php echo $noteComment['NoteComment']['body']; ?>&nbsp;</td>
		<td><?php echo $noteComment['NoteComment']['created']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($noteComment['User']['username'], array('controller' => 'users', 'action' => 'view', $noteComment['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($noteComment['Note']['title'], array('controller' => 'notes', 'action' => 'view', $noteComment['Note']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $noteComment['NoteComment']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $noteComment['NoteComment']['id'])); ?>
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
 		<legend><?php __('Add Note Comment'); ?></legend>
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
		<li><?php echo  $noteLink->editLink($note['Note']['id'],$note['Note']['user_id'],$cuid); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Note', true), array('action' => 'delete', $note['Note']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $note['Note']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Notes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Note', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
