<div id="left">
    <h2>上传头像</h2>
    <?php echo $session->flash() ?>
    <?php echo $this->Avatar->show($cuid) ?>
    
<form action="upload_avatar" enctype="multipart/form-data" method="post"  accept-charset="utf-8">
   选择图片: <INPUT NAME="uploadfile" TYPE="file"><input type="submit" value="Continue &rarr;">
</form>
</div>