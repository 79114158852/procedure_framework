<form method="get" class="searchform">
    <button type="submit" class="btn btn__blue"><i class="fas fa-filter"></i>Найти</button>
    <a href="/<?php echo web_get_urn(); ?>" class="btn btn__red"><i class="fas fa-times"></i>Очистить</button>
</form>
<a class="btn btn__green" href="/<?php echo web_get_urn(); ?>?id=new&back=<?php echo web_encode_url(); ?>">+ Добавить</a>
<table id="sort" class="data-table tablesorter model-table">
  <thead>
      <tr>
        <th class="dont-sort sorter-false" data-sorter="false"><input type="checkbox" class="list-checker"></th>
        <th class="dont-sort sorter-false" data-sorter="false">#</th>
        <th>Группа</th>
        <th>Модель</th>
      </tr>
  </thead>
  <tbody>
      <?php foreach ($models['dirs'] as $group => $files): ?>
      <tr data="/<?php echo web_get_urn(); ?>?id=<?php echo $dir; ?>&back=<?php echo web_encode_url(); ?>">    
          <td class="no-action"><input type="checkbox" name=""></td>
          <td class="no-action"><?php echo $k++;?></td>
          <td><?php echo $group; ?></td>
          <td><?php echo join('<br>', $files); ?></td>
      </tr>
      <?php endforeach; ?>
  </tbody>
</table>




