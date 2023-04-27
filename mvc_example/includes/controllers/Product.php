<?php

abstract class Product implements ProductInterface {

  /**
   * The product id.
   *
   * @var int
   */
  protected $id;

  /**
   * Produce constructor.
   *
   * @param int $id
   *   The product id
   */
  public function __construct($id) {
    $this->id = $id;
  }

  /**
   * @return int
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Get product name
   * @return string
   */
  public function getName() {
    $result = db_query("
      SELECT title
      FROM {node}
      WHERE nid = :nid",
        array(':nid' => $this->id))->fetchField();

    return $result;
  }

  /**
   * Get product price
   * @return null|int
   */
  public function getPrice() {
    $result = db_query("
      SELECT product_price_value
      FROM {field_data_product_price}
      WHERE entity_id = :nid",
        array(':nid' => $this->id))->fetchField();
    return $result;
  }

  /**
   * Get product brand
   * @return null|array
   */
  public function getBrand() {
    $result =  db_query("
      SELECT name
      FROM {field_data_product_brand} pb
      INNER JOIN {taxonomy_term_data} t ON pb.product_brand_tid = t.tid
      WHERE entity_id = :nid",
        array(':nid' => $this->id))->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
      $result = reset($result);
    }

    return $result;
  }

  /**
   * Get product manufacture date
   * @return string|null
   */
  public function getManufactureDate() {
    $result =  db_query("
      SELECT product_manufacture_date_value
      FROM {field_data_product_manufacture_date} md
      WHERE entity_id = :nid",
        array(':nid' => $this->id))->fetchField();

    if ($result) {
      $result = date('d.m.Y', $result);
    }

    return $result;
  }

  /**
   * Get product expiration date
   * @return string|null
   */
  public function getExpirationDate() {
    $result =  db_query("
      SELECT ed.product_expiration_date_value,
             md.product_manufacture_date_value
      FROM {field_data_product_expiration_date} ed
      INNER JOIN {field_data_product_manufacture_date} md ON md.entity_id = ed.entity_id
      WHERE ed.entity_id = :nid",
        array(':nid' => $this->id))->fetchAll(PDO::FETCH_ASSOC);

    $result = reset($result);
    $manufacture_date = $result['product_manufacture_date_value'];
    $expiration_date = $result['product_expiration_date_value'];
    $manufacture_date_to_timestamp_format = $expiration_date * 24 * 60 * 60;
    $current_time = time();
    $days_left = ($manufacture_date_to_timestamp_format - ($current_time - $manufacture_date)) / 60 / 60 / 24;

    if ($days_left > 0) {
      return floor($days_left);
    } else {
      return 'end';
    }
  }
}
