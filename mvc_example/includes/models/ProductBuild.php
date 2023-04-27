<?php

/**
 * @file
 * Class builder default product type fields
 */

class ProductBuild extends Product {

  /**
   * Get specific fields from product
   *
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
