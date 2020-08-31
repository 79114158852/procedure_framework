<form method="POST">
  <input type = "hidden" name = "back" value = "<?php echo $options['redirect']; ?>">
  <input type = "text" name = "login" value = "<?php echo $login ?? ''; ?>">
  <input type = "password" name = "pass" value = "<?php echo $pass ?? ''; ?>">
  <input type="submit">
</form> 