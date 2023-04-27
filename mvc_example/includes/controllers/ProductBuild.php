<?php

class ProductBuild extends Product {

  /**
   * Get specific fields from product
   * @return array
   */
  protected function getProductCustomFields () {
    $result =  db_query("
      SELECT body.body_value
      FROM {node} n
      JOIN {field_data_body} body ON n.nid = body.entity_id
      WHERE n.nid = :nid",
      array(':nid' => $this->id))->fetchAll(PDO::FETCH_ASSOC);

    return reset($result);
  }

  protected function buildFieldsArray() {
    $fields_arr = $this->getProductCustomFields();
    $fields_arr['title'] = $this->getName();
    $fields_arr['brand'] = $this->getBrand();
    $fields_arr['price'] = $this->getPrice();
    $fields_arr['id'] = $this->getId();

    $output = theme('product_template', array('data' => $fields_arr));
    return $output;
  }

}
