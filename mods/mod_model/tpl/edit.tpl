<form class="form" method="post">
  <?php foreach ($fields as $index=>$opts):  ?>
  
    <?php echo model_build_field($index, $opts, $data[$options['model'].'_'.$index] ?? ''); ?>
  
  <?php endforeach; ?>
  <div class="form-controls">
      <button type="submit" class="btn btn__green"><i class="far fa-save"></i>Сохранить</button>
      <a href="<?php echo base64_decode($_GET['back']); ?>" class="btn btn__red"><i class="fas fa-times"></i>Закрыть</a>
  </div>
</form>