
<div class='left'>
	

<h2><?php echo $user['User']['username'] ?></h2>
	<ul>
		<li><?php echo $this->Html->link(__('日记', true), "/people/{$uid}/diary"); ?> </li>

	</ul>
<div id="note">
<h2><?php __('Notes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<?php
	foreach ($notes as $note):
	?>
	<tr>
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
</div>
	<div class="related">
		<h3><?php __('Related Diaries');?></h3>
		<?php if (!empty($user['Diary'])):?>
		<table cellpaliing = "0" cellspacing = "0">
		<tr>
			<th><?php __('Id'); ?></th>
			<th><?php __('Name'); ?></th>
			<th><?php __('User Id'); ?></th>
			<th class="actions"><?php __('Actions');?></th>
		</tr>
		<?php
			$i = 0;
			foreach ($user['Diary'] as $diary):
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
			?>
			<tr<?php echo $class;?>>
				<td><?php echo $diary['id'];?></td>
				<td><?php echo $diary['name'];?></td>
				<td><?php echo $diary['user_id'];?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View', true), array('controller' => 'diaries', 'action' => 'view', $diary['id'])); ?>
					<?php echo $this->Html->link(__('Edit', true), array('controller' => 'diaries', 'action' => 'edit', $diary['id'])); ?>
					<?php echo $this->Html->link(__('Delete', true), array('controller' => 'diaries', 'action' => 'delete', $diary['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $diary['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>
	</div>
</div>



<div class= "right">
	<div class="profile">
		<ul><?php $i = 0; $class = ' class="altrow"';?>
			<li<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $this->Avatar->show($user['User']['id']); ?>
				&nbsp;
			</li>
			<li<?php if ($i % 2 == 0) echo $class;?>><?php __('Username'); ?></li>
			<li<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $user['User']['username']; ?>
				&nbsp;
			</li>
			<li<?php if ($i % 2 == 0) echo $class;?>><?php __('Uid'); ?></li>
			<li<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $user['User']['uid']; ?>
				&nbsp;
			</li>
			<li<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></li>
			<li<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $user['User']['created']; ?>
				&nbsp;
			</li>
		</ull>
	</div>
	<div id="guest">
		<h2>留言本</h2>
			<div class="guests form">
				<?php echo $this->Form->create('Guest',array('url'=>'/guests/add'));?>
	
					<?php
						echo $form->hidden('user_id',array('value'=>$cuid));
						echo $form->hidden('sender_id',array('value'=>$uid));
						echo $this->Form->input('body');
					?>
				<?php echo $this->Form->end(__('Submit', true));?>
			</div>
				<table border="0" cellspacing="5" cellpaliing="5">
			
				<?php
				$i = 0;
				foreach ($guests as $guest):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
				<tr<?php echo $class;?>>
					<td>
						<?php echo $this->Html->link($guest['User']['username'], array('controller' => 'users', 'action' => 'view', $guest['User']['id'])); ?>
					</td>
					<td><?php echo $guest['Guest']['body']; ?>&nbsp;</td>
					<td><?php echo $guest['Guest']['created']; ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('View', true), array('action' => 'view', $guest['Guest']['id'])); ?>
						<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $guest['Guest']['id'])); ?>
						<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $guest['Guest']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $guest['Guest']['id'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
				</table>
		</div>
</div>
