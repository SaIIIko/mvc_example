<table>
  <thead>
    <tr>
      <th>Название</th>
      <th>Тип материала</th>
      <th>Стоимость</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($data as $delta => $item) : ?>
    <?php print '<tr>'; ?>
      <?php print '<td>'.$item['title'].'</td>'; ?>
      <?php print '<td>'.$item['type'].'</td>'; ?>
      <?php print '<td>'.$item['product_price_value'].'</td>'; ?>
    <?php print '</tr>'; ?>
  <?php endforeach; ?>
  </tbody>
</table>
