
<div class='left'>
	

<h2><?php echo $user['User']['username'] ?></h2>



	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('日记', true), "/people/{$uid}/diary"); ?> </li>

	</ul>

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
			<li<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></li>
			<li<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $user['User']['id']; ?>
				&nbsp;
			</li>
			<li<?php if ($i % 2 == 0) echo $class;?>><?php __('Username'); ?></li>
			<li<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $user['User']['username']; ?>
				&nbsp;
			</li>
			<li<?php if ($i % 2 == 0) echo $class;?>><?php __('Password'); ?></li>
			<li<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $user['User']['password']; ?>
				&nbsp;
			</li>
			<li<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></li>
			<li<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $user['User']['email']; ?>
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
			<li<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></li>
			<li<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $user['User']['modified']; ?>
				&nbsp;
			</li>
		</ull>
	</div>

										
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Diary', true), array('controller' => 'diaries', 'action' => 'ali'));?> </li>
		</ul>
	</div>
	<div class="related">
		<h3><?php __('Related Diary Posts');?></h3>
		<?php if (!empty($user['DiaryPost'])):?>
		<table cellpaliing = "0" cellspacing = "0">
		<tr>
			<th><?php __('Id'); ?></th>
			<th><?php __('Title'); ?></th>
			<th><?php __('Created'); ?></th>
			<th><?php __('Modified'); ?></th>
			<th><?php __('Body'); ?></th>
			<th><?php __('Diary Id'); ?></th>
			<th><?php __('User Id'); ?></th>
			<th class="actions"><?php __('Actions');?></th>
		</tr>
		<?php	foreach ($user['DiaryPost'] as $diaryPost):?>
			<tr<?php echo $class;?>>
				<td><?php echo $diaryPost['id'];?></td>
				<td><?php echo $diaryPost['title'];?></td>
				<td><?php echo $diaryPost['created'];?></td>
				<td><?php echo $diaryPost['modified'];?></td>
				<td><?php echo $diaryPost['body'];?></td>
				<td><?php echo $diaryPost['diary_id'];?></td>
				<td><?php echo $diaryPost['user_id'];?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View', true), array('controller' => 'diary_posts', 'action' => 'view', $diaryPost['id'])); ?>
					<?php echo $this->Html->link(__('Edit', true), array('controller' => 'diary_posts', 'action' => 'edit', $diaryPost['id'])); ?>
					<?php echo $this->Html->link(__('Delete', true), array('controller' => 'diary_posts', 'action' => 'delete', $diaryPost['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $diaryPost['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
		<?php endif; ?>
	
	
	
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('New Diary Post', true), array('controller' => 'diary_posts', 'action' => 'ali'));?> </li>
			</ul>
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
</div>
