<?php echo $session->flash() ?>
<?php if (isset($smtp_errors)): ?>
<?php echo $smtp_errors ?>
<?php endif ?>