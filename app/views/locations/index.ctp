<div id="cities index">
	<?php if (isset($province)): ?>
	<?php foreach ($province as $city): ?>
		<?php echo $html->link($city['City']['city'], "/locations/{$province['Province']['province']}/{$city['City']['city']}") ?>
	<?php endforeach ?>		
	<?php endif ?>
<?php if (!is_null($provinces)): ?>
		<?php foreach ($provinces as $province): ?>
		<?php echo $html->link($province['Province']['province'], "/locations/{$province['Province']['province']}") ?>
	<?php endforeach ?>
<?php endif ?>

</div>