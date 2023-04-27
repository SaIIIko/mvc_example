<?php

/**
 * @file
 * Class builder yogurt product type fields
 */

class ProductYogurtBuild extends Product {

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
      JOIN {field_data_body} body ON n.nid = body.entity_id
      LEFT JOIN {field_data_product_carbohydrates} f1 ON n.nid = f1.entity_id
      LEFT JOIN {field_data_product_expiration_date} f2 ON n.nid = f2.entity_id
      LEFT JOIN {field_data_product_fats} f3 ON n.nid = f3.entity_id
      LEFT JOIN {field_data_product_fat_content} f4 ON n.nid = f4.entity_id
      LEFT JOIN {field_data_product_proteins} f5 ON n.nid = f5.entity_id
      LEFT JOIN {field_data_product_taste} f6 ON n.nid = f6.entity_id
      LEFT JOIN {field_data_product_weight} f7 ON n.nid = f7.entity_id
      WHERE n.nid = :nid",
        array(':nid' => $this->id))->fetchAll(PDO::FETCH_ASSOC);

      return reset($result);
    } else {
      return NULL;
    }
  }

  /**
   * Get all product fields and push array to template
   *
   * @return mixed
   * @throws \Exception
   */
  public function buildFieldsArray() {
    $fields_arr = $this->getProductCustomFields();
    $fields_arr['id'] = $this->getId();
    $fields_arr['title'] = $this->getName();
    $fields_arr['brand'] = $this->getBrand();
    $fields_arr['price'] = $this->getPrice();
    $fields_arr['manufacture_date'] = $this->getManufactureDate();
    $fields_arr['expiration_date'] = $this->getExpirationDate();

    $output = theme('product_template', array('data' => $fields_arr));
    return $output;
  }

}
