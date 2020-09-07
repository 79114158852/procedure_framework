<a class="btn btn-green" href="">+ Добавить</a>
<table id="sort" class="data-table tablesorter">
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