<form method="get" class="searchform">
    <?php echo model_db_searchform($model, $_GET ?? []); ?>
    <button type="submit" class="btn btn__blue"><i class="fas fa-filter"></i>Найти</button>
    <a href="/<?php echo web_get_urn(); ?>" class="btn btn__red"><i class="fas fa-times"></i>Очистить</button>
</form>
<a class="btn btn__green" href="/<?php echo web_get_urn(); ?>?id=new&back=<?php echo web_encode_url(); ?>">+ Добавить</a>
<table id="sort" class="data-table tablesorter model-table">
  <thead>
      <tr>
        <th class="dont-sort sorter-false" data-sorter="false"><input type="checkbox" class="list-checker"></th>
      <?php foreach ($thead as $th): ?>
        <th<?php echo $th['sort'] == 0 ? ' class="sorter-false dont-sort"' : ''; ?><?php echo $th['sort'] == 0 ? ' data-sorter="false"' : ''; ?>><?php echo $th['teg']; ?></th>
      <?php endforeach; ?>
      </tr>
  </thead>
  <tbody>
      <?php foreach ($data as $td): ?>
      <tr data="/<?php echo web_get_urn(); ?>?id=<?php echo reset($td); ?>&back=<?php echo web_encode_url(); ?>">    
          <td class="no-action"><input type="checkbox" name=""></td>
          <?php foreach ($td as $index => $value): ?>
                <td><?php echo $value; ?></td>
          <?php endforeach; ?>
      </tr>
      <?php endforeach; ?>
  </tbody>
</table>