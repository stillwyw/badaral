<div id="left">
    <h2>更新小组头像</h2>
    <?php echo $session->flash() ?>
    <?php echo $this->Avatar->groupAvatar($group) ?>
    <?php echo $form->create(null,array('url'=>"/group/$ggid/new_avatar",'enctype' => 'multipart/form-data')) ?>
    选择图片: <INPUT NAME="uploadfile" TYPE="file"><input type="submit" value="Continue &rarr;">
    <?php echo $form->end(__('Submit', true));?>
</div>