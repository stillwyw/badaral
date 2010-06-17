<?php foreach ($friends as $friend): ?>
    <?php echo $this->Avatar->userLink($friend['User']['id'],$friend['User']['uid']) ?>
<?php endforeach ?>