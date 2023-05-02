<?php

/**
 * @file
 * Class builder yogurt product type fields
 */

class ProductYogurtBuild extends ProductBuild  {

  /**
   * Get specific fields from product yogurt
   * @return array|null
   */
  public function getProductCustomFields() {
    $getProductType = $this->getProductType();
    if ($getProductType['name'] == 'Йогурт') {
      $result =  db_query("
      SELECT body.body_value,
             f1.product_carbohydrates_value,
             f2.product_expiration_date_value,
             f3.product_fats_value,
             f4.product_fat_content_value,
             f5.product_proteins_value,
             f7.product_weight_value
      FROM {node} n
      INNER JOIN {field_data_body} body ON n.nid = body.entity_id
      INNER JOIN {field_data_product_carbohydrates} f1 ON n.nid = f1.entity_id
      INNER JOIN {field_data_product_expiration_date} f2 ON n.nid = f2.entity_id
      INNER JOIN {field_data_product_fats} f3 ON n.nid = f3.entity_id
      INNER JOIN {field_data_product_fat_content} f4 ON n.nid = f4.entity_id
      INNER JOIN {field_data_product_proteins} f5 ON n.nid = f5.entity_id
      INNER JOIN {field_data_product_taste} f6 ON n.nid = f6.entity_id
      INNER JOIN {field_data_product_weight} f7 ON n.nid = f7.entity_id
      WHERE n.nid = :nid",
        array(':nid' => $this->getId()))->fetchAll(PDO::FETCH_ASSOC);

      return reset($result);
    } else {
      return NULL;
    }
  }
}
