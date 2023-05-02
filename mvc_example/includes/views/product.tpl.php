<?php if ($data): ?>
  <div class="product__full">
    <div class="product__full-wrap">
      <div class="product__left">
        <img src="/sites/all/modules/custom/mvc_example/img/no_image.jpg" alt="">
      </div>
      <div class="product__right">
        <h1 class="page-title"><?php print $data['title'] ?></h1>
        <?php if ($data['price']): ?>
          <div class="attr-item attr-item__price">
            <div class="value"><?php print $data['price'] ?> руб.</div>
          </div>
        <?php endif; ?>
        <?php if ($data['brand']['name']): ?>
          <div class="attr-item">
            <div class="title">Бренд:</div>
            <div class="value"><?php print $data['brand']['name'] ?></div>
          </div>
        <?php endif; ?>
        <?php if ($data['manufacture_date']): ?>
          <div class="attr-item">
            <div class="title">Дата изготовления:</div>
            <div class="value"><?php print $data['manufacture_date'] ?></div>
          </div>
        <?php endif; ?>
        <?php if ($data['expiration_date']): ?>
          <div class="attr-item">
            <div class="title">Срок годности:</div>
            <div class="value">
              <?php if ($data['expiration_date'] != 'end'): ?>
                <?php print 'До истечения срока годности остало дней -  '.$data['expiration_date'] ?>
              <?php else: ?>
                <?php print 'Срок годности истек!' ?>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <?php if (isset($data['body_value'])): ?>
      <div class="description-item">
        <div class="title">Описание:</div>
        <div class="value"><?php print $data['body_value'] ?></div>
      </div>
    <?php endif; ?>
  </div>
<?php endif; ?>
