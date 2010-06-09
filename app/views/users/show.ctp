用户个人主页。




<?php
	$i = 0;
	foreach ($guests as $guest):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $guest['Guest']['id']; ?>&nbsp;</td>
		<td><?php echo $guest['Guest']['sender_id']; ?>&nbsp;</td>
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