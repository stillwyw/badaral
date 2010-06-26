<div class="left">
<h2><?php  __('Event');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('活动主题'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $event['Event']['name']; ?>
			&nbsp;
		</dd>
		<dt>创建者</dt>
		<dd><?php echo $avatar->userLink($sponsor['User']) ?></dd>
		<dt><?php __('创建日期'); ?></dt>
		<dd>
			<?php echo $event['Event']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('最后更新'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $event['Event']['updated']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('活动描述'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $event['Event']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(''); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $event['Event']['group_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('活动开始时间'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $event['Event']['begins']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('活动结束时间'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $event['Event']['ends']; ?>
			&nbsp;
		</dd>
	</dl>
	<?php if ($role): ?>
	    <?php if ($role==EventUser::join): ?>
	        我要参与
	    <?php elseif ($role==EventUser::interest): ?>
	        	        我感兴趣
	    <?php elseif ($role==EventUser::sponsor): ?>
	    <?php else: ?>
	           	<?php echo $html->link('[参加]', "/events/join/{$event['Event']['id']}") ?>
	<?php echo $html->link('[感兴趣]', "/events/interest/{$event['Event']['id']}") ?>     
	    <?php endif ?>
	<?php endif ?>

</div>
<div class="right">
	<h3><?php __('参与的成员'); ?></h3>
	<?php foreach ($joiners as $joiner ): ?>
	    <?php echo $avatar->userLink($joiner['User']) ?>
	<?php endforeach ?>
	
	<h3><?php __('感兴趣的成员'); ?></h3>
	<?php foreach ($interesters as $interester): ?>
	    <?php echo $avatar->userLink($interester['User']) ?>
	<?php endforeach ?>
</div>