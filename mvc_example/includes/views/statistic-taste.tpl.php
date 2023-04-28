<table>
  <thead>
    <tr>
      <th>Название</th>
      <th>Вкус</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($data as $delta => $item) : ?>
    <?php print '<tr>'; ?>
    <?php print '<td>'.$item['title'].'</td>'; ?>
    <?php print '<td>'.$item['name'].'</td>'; ?>
    <?php print '</tr>'; ?>
  <?php endforeach; ?>
  </tbody>
</table>
