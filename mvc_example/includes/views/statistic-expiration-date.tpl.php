<table>
  <thead>
    <tr>
      <th>Название</th>
      <th>Срок годности</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($data as $delta => $item) : ?>
    <?php print '<tr>'; ?>
    <?php print '<td>'.$item['title'].'</td>'; ?>
    <?php
      if ($item['product_expiration_date_value']){
        print '<td>'.$item['product_expiration_date_value'].' дней</td>';
      } else {
        print '<td>Срок годности отсутствует</td>';
      }
    ?>
    <?php print '</tr>'; ?>
  <?php endforeach; ?>
  </tbody>
</table>
