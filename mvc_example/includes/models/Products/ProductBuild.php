<?php

/**
 * @file
 * Class builder default product type fields
 */

class ProductBuild extends Product {

  /**
   * Build fields array for template
   *
   * @return array
   */
  public function buildFieldsArray() {
    $result = $this->getProductCustomFields();
    $result['id'] = $this->getId();
    $result['title'] = $this->getName();
    $result['brand'] = $this->getBrand();
    $result['price'] = $this->getPrice();
    $result['manufacture_date'] = $this->getManufactureDate();
    $result['expiration_date'] = $this->getExpirationDate();
    return $result;
  }

  /**
   * Get specific fields from product
   *
   * @return array
   */
  public function getProductCustomFields () {
    $result =  db_query("
      SELECT body.body_value
      FROM {node} n
      JOIN {field_data_body} body ON n.nid = body.entity_id
      WHERE n.nid = :nid",
      array(':nid' => $this->getId()))->fetchAll(PDO::FETCH_ASSOC);

    return reset($result);
  }
}
